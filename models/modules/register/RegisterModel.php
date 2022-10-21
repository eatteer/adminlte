<?php
include "database/Database.php";

class RegisterModel
{
  static function checkIfUserWithEmailExists($email): bool
  {
    $pdo = Database::connect();
    $query = "SELECT id FROM users WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $doesExists = boolval($user);
    return $doesExists;
  }

  static function registerUser($userData): bool
  {
    $pdo = Database::connect();
    $query = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
    $statement = $pdo->prepare($query);
    $statement->bindParam("name", $userData["name"], PDO::PARAM_STR);
    $statement->bindParam("surname", $userData["surname"], PDO::PARAM_STR);
    $statement->bindParam("email", $userData["email"], PDO::PARAM_STR);
    $statement->bindParam("password", $userData["password"], PDO::PARAM_STR);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }
}
