<?php
require_once "database/Database.php";
class UserModel
{
  static function findById($id): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam("id", $id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  static function findUserByEmail(string $email): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $email, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $user = $row ? $row : [];
    return $user;
  }

  static function create($userData): bool
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

  static function update($userId, $userData): bool
  {
    $pdo = Database::connect();
    $query = "UPDATE users SET name = :name, surname = :surname, email = :email, password = :password WHERE id = $userId";
    $statement = $pdo->prepare($query);
    $statement->bindParam("name", $userData["name"], PDO::PARAM_STR);
    $statement->bindParam("surname", $userData["surname"], PDO::PARAM_STR);
    $statement->bindParam("email", $userData["email"], PDO::PARAM_STR);
    $statement->bindParam("password", $userData["password"], PDO::PARAM_STR);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }
}
