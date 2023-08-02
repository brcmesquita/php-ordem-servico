<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $entry_date = Sanitizer::sanitizeInput($_POST['entry_date']);
  $entry_reason = Sanitizer::sanitizeInput($_POST['entry_reason']);
  $client = Sanitizer::sanitizeInput($_POST['client']);
  $devices = $_POST['device'];
  $device_types = $_POST['device_type'];
  $manufacturers = $_POST['manufacturer'];
  $models = $_POST['model'];

  $db = new DB();
  $conn = $db->getConnection();

  // Inserir a ordem de serviço
  $query = "INSERT INTO order_service (entry_date, entry_reason_id, client_id) VALUES (:entry_date, :entry_reason, :client)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':entry_date', $entry_date, PDO::PARAM_STR);
  $stmt->bindParam(':entry_reason', $entry_reason, PDO::PARAM_INT);
  $stmt->bindParam(':client', $client, PDO::PARAM_INT);

  if (!$stmt->execute()) {
    echo "Erro ao cadastrar a ordem de serviço.";
    exit;
  }

  $order_service_id = $conn->lastInsertId();

  // Inserir os aparelhos relacionados
  if (count($devices) > 0) {
    $query = "INSERT INTO order_item (order_service_id, device_id, manufacturer_id, model, serial_number, defect, accessories, observations, item_status_id) VALUES ";
    $values = array();

    for ($i = 0; $i < count($devices); $i++) {
      $device = Sanitizer::sanitizeInput($devices[$i]);
      $device_type = Sanitizer::sanitizeInput($device_types[$i]);
      $manufacturer = Sanitizer::sanitizeInput($manufacturers[$i]);
      $model = Sanitizer::sanitizeInput($models[$i]);

      // Aqui você deve implementar a lógica para validar e salvar as informações dos aparelhos

      $values[] = "($order_service_id, $device, $manufacturer, '$model', '', '', '', '', 1)";
    }

    $query .= implode(',', $values);
    $stmt = $conn->prepare($query);

    if (!$stmt->execute()) {
      echo "Erro ao cadastrar os aparelhos.";
      exit;
    }
  }

  header('Location: ../home.php');
}
?>