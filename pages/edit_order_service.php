<?php
// Verificar se a ordem de serviço foi selecionada para edição
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: home.php');
  exit;
}

require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

$db = new DB();
$conn = $db->getConnection();

// Buscar informações da ordem de serviço
$order_id = Sanitizer::sanitizeInput($_GET['id']);

$query = "SELECT * FROM order_service WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $order_id, PDO::PARAM_INT);
$stmt->execute();
$order_service = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se a ordem de serviço existe
if (!$order_service) {
  header('Location: home.php');
  exit;
}

// Buscar aparelhos relacionados à ordem de serviço
$query = "SELECT * FROM order_item WHERE order_service_id = :order_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- ... (código HTML para exibir o formulário de edição da ordem de serviço) ... -->