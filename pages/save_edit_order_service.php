<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $order_id = Sanitizer::sanitizeInput($_POST['order_id']);
  $entry_date = Sanitizer::sanitizeInput($_POST['entry_date']);
  $entry_reason = Sanitizer::sanitizeInput($_POST['entry_reason']);
  $client = Sanitizer::sanitizeInput($_POST['client']);
  $devices = $_POST['device'];
  $device_types = $_POST['device_type'];
  $manufacturers = $_POST['manufacturer'];
  $models = $_POST['model'];

  $db = new DB();
  $conn = $db->getConnection();

  // Atualizar a ordem de serviço
  $query = "UPDATE order_service SET entry_date = :entry_date, entry_reason_id = :entry_reason, client_id = :client WHERE id = :order_id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
  $stmt->bindParam(':entry_date', $entry_date, PDO::PARAM_STR);
  $stmt->bindParam(':entry_reason', $entry_reason, PDO::PARAM_INT);
  $stmt->bindParam(':client', $client, PDO::PARAM_INT);

  if (!$stmt->execute()) {
    echo "Erro ao atualizar a ordem de serviço.";
    exit;
  }

  // Atualizar os aparelhos relacionados
  if (count($devices) > 0) {
    // Implemente a lógica para atualizar os aparelhos relacionados no banco de dados
  }

  header('Location: home.php');
}
?>