<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $reason = Sanitizer::sanitizeInput($_POST['reason']);

  $db = new DB();
  $conn = $db->getConnection();

  $query = "INSERT INTO entry_reason (reason) VALUES (:reason)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':reason', $reason, PDO::PARAM_STR);

  if ($stmt->execute()) {
    header('Location: ../home.php');
  } else {
    echo "Erro ao cadastrar o motivo de entrada.";
  }
}
?>