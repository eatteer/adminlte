<?php
class Model
{
  private Database $database;

  function __construct()
  {
    $this->database = new Database();
  }

  function query(string $query): PDOStatement
  {
    return $this->database->connect()->query($query);
  }

  function prepare(string $query): PDOStatement
  {
    return $this->database->connect()->prepare($query);
  }
}
