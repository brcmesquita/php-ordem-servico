<?php
session_start();
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

$db = new DB();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = Sanitizer::sanitizeInput($_POST['name']);
  $email = Sanitizer::sanitizeInput($_POST['email']);
  $password = Sanitizer::sanitizeInput($_POST['password']);
  $confirm_password = Sanitizer::sanitizeInput($_POST['confirm_password']);


  if ($password !== $confirm_password) {
    $_SESSION['register_error'] = 'As senhas não coincidem';
    header('Location: ../register.php');
    exit;
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $hashed_password);

  try {
    $stmt->execute();
    $_SESSION['registration_success'] = 'Usuário cadastrado com sucesso';
    header('Location: ../login.php');
    exit;
  } catch (PDOException $e) {
    $_SESSION['register_error'] = 'Erro ao cadastrar usuário';
    header('Location: ../register.php');
    exit;
  }
}
?>