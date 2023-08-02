<?php
session_start();
require_once '../../db/DB.php';
require_once '../../utils/Sanitizer.php';

$db = new DB();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT id, name, email, password FROM users WHERE email = :email";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  if ($stmt->rowCount() === 1) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];

      header('Location: /home.php');
      exit;
    } else {
      $_SESSION['login_error'] = 'Senha incorreta';
      header('Location: /login.php');
      exit;
    }
  } else {
    $_SESSION['login_error'] = 'Usuário não encontrado';
    header('Location: /login.php');
    exit;
  }
}
?>