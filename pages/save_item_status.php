<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $status = Sanitizer::sanitizeInput($_POST['status']);

  $db = new DB();
  $conn = $db->getConnection();

  $query = "INSERT INTO item_status (name) VALUES (:status)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':status', $status, PDO::PARAM_STR);

  if ($stmt->execute()) {
    header('Location: ../home.php');
  } else {
    echo "Erro ao cadastrar o status do item.";
  }
}
?>