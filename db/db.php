<?php

class DB
{
  private $host = 'localhost';
  private $db_name = 'eletronica_db';
  private $username = 'root';
  private $password = '';
  private $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
?>