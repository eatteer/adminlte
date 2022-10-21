<?php
class Database
{
  private string $host;
  private string $dbname;
  private string $user;
  private string $password;

  function __construct()
  {
    // Values can be ENV variables
    $this->host = "localhost";
    $this->dbname = "adminlte";
    $this->user = "root";
    $this->password = "";
  }

  function connect(): PDO
  {
    try {
      $dsn = "mysql:host=$this->host;dbname=$this->dbname";
      $pdo = new PDO($dsn, $this->user, $this->password);
      return $pdo;
    } catch (PDOException  $exception) {
      throw $exception;
    }
  }
}
