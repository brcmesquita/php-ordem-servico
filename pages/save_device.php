<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = Sanitizer::sanitizeInput($_POST['name']);
  // Adicione os demais campos do formulário de cadastro de aparelho aqui

  $db = new DB();
  $conn = $db->getConnection();

  $query = "INSERT INTO devices (name) VALUES (:name)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);

  if ($stmt->execute()) {
    // Redirecionar para a página inicial após cadastrar o aparelho
    header('Location: ../home.php');
  } else {
    // Exibir uma mensagem de erro caso haja algum problema
    echo "Erro ao cadastrar o aparelho.";
  }
}
?>