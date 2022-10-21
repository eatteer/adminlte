<?php
class Database
{
  static private string $host = "localhost";
  static private string $dbname = "adminlte";
  static private string $user = "root";
  static private string $password = "";

  static function connect(): PDO
  {
    // try {
    $host = self::$host;
    $dbname = self::$dbname;
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, self::$user, self::$password);
    return $pdo;
    // } catch (PDOException  $exception) {
    //   throw $exception;
    // }
  }
}
