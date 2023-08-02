<?php
session_start();

// Verificar se o usuário não está logado
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}
?>