<?php
class RegisterModel
{
  static function registerUser($userData)
  {
    $pdo = Database::connect();
    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $userData["email"], PDO::PARAM_STR);
  }
}
