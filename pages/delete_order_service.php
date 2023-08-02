<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: home.php');
  exit;
}

require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

$db = new DB();
$conn = $db->getConnection();

$order_id = Sanitizer::sanitizeInput($_GET['id']);

// Verificar se a ordem de serviço existe
$query = "SELECT * FROM order_service WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $order_id, PDO::PARAM_INT);
$stmt->execute();
$order_service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order_service) {
  header('Location: home.php');
  exit;
}

// Excluir a ordem de serviço e os aparelhos relacionados
$query = "DELETE FROM order_service WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $order_id, PDO::PARAM_INT);

if (!$stmt->execute()) {
  echo "Erro ao excluir a ordem de serviço.";
  exit;
}

$query = "DELETE FROM order_item WHERE order_service_id = :order_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
$stmt->execute();

header('Location: home.php');
?>