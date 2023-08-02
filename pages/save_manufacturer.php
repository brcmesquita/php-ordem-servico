<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = Sanitizer::sanitizeInput($_POST['name']);

  $db = new DB();
  $conn = $db->getConnection();

  $query = "INSERT INTO manufacturers (name) VALUES (:name)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);

  if ($stmt->execute()) {
    header('Location: home.php');
  } else {
    echo "Erro ao cadastrar o fabricante.";
  }
}
?>