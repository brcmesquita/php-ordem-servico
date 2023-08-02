<?php
require_once '../db/DB.php';
require_once '../utils/Sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = Sanitizer::sanitizeInput($_POST['name']);
  $rg = Sanitizer::sanitizeInput($_POST['rg']);
  $cpf = Sanitizer::sanitizeInput($_POST['cpf']);
  $cnpj = Sanitizer::sanitizeInput($_POST['cnpj']);
  $address = Sanitizer::sanitizeInput($_POST['address']);
  $number = Sanitizer::sanitizeInput($_POST['number']);
  $complement = Sanitizer::sanitizeInput($_POST['complement']);
  $district = Sanitizer::sanitizeInput($_POST['district']);
  $city = Sanitizer::sanitizeInput($_POST['city']);
  $state = Sanitizer::sanitizeInput($_POST['state']);
  $phone1 = Sanitizer::sanitizeInput($_POST['phone1']);
  $phone2 = Sanitizer::sanitizeInput($_POST['phone2']);
  $phone3 = Sanitizer::sanitizeInput($_POST['phone3']);
  $email = Sanitizer::sanitizeInput($_POST['email']);

  $db = new DB();
  $conn = $db->getConnection();

  $query = "INSERT INTO clients (name, rg, cpf, cnpj, address, number, complement, district, city, state, phone1, phone2, phone3, email) VALUES (:name, :rg, :cpf, :cnpj, :address, :number, :complement, :district, :city, :state, :phone1, :phone2, :phone3, :email)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':rg', $rg, PDO::PARAM_STR);
  $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
  $stmt->bindParam(':address', $address, PDO::PARAM_STR);
  $stmt->bindParam(':number', $number, PDO::PARAM_STR);
  $stmt->bindParam(':complement', $complement, PDO::PARAM_STR);
  $stmt->bindParam(':district', $district, PDO::PARAM_STR);
  $stmt->bindParam(':city', $city, PDO::PARAM_STR);
  $stmt->bindParam(':state', $state, PDO::PARAM_STR);
  $stmt->bindParam(':phone1', $phone1, PDO::PARAM_STR);
  $stmt->bindParam(':phone2', $phone2, PDO::PARAM_STR);
  $stmt->bindParam(':phone3', $phone3, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);

  if ($stmt->execute()) {
    header('Location: ../home.php');
  } else {
    echo "Erro ao cadastrar o cliente.";
  }
}
?>