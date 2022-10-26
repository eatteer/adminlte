<?php
require_once "database/Database.php";

class UserModel
{
  static function findById(string $id): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam("id", $id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  static function findActiveById(string $id): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE id = :id AND state = :state";
    $activeState = "active";
    $statement = $pdo->prepare($query);
    $statement->bindParam("id", $id, PDO::PARAM_INT);
    $statement->bindParam("state", $activeState, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  static function findByEmail(string $email): array
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

  static function findActiveByEmail(string $email): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE email = :email AND state = :state";
    $activeState = "active";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $email, PDO::PARAM_STR);
    $statement->bindParam("state", $activeState, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $user = $row ? $row : [];
    return $user;
  }

  static function create(array $userData): bool
  {
    $pdo = Database::connect();
    $query = "INSERT INTO users (name, surname, email, password, state) VALUES (:name, :surname, :email, :password, :state)";
    $stateOnCreation = "active";
    $statement = $pdo->prepare($query);
    $statement->bindParam("name", $userData["name"], PDO::PARAM_STR);
    $statement->bindParam("surname", $userData["surname"], PDO::PARAM_STR);
    $statement->bindParam("email", $userData["email"], PDO::PARAM_STR);
    $statement->bindParam("password", $userData["password"], PDO::PARAM_STR);
    $statement->bindParam("state", $stateOnCreation, PDO::PARAM_STR);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }

  static function update(string $userId, array $userData): bool
  {
    $pdo = Database::connect();
    $query = "UPDATE users SET name = :name, surname = :surname, email = :email WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam("name", $userData["name"], PDO::PARAM_STR);
    $statement->bindParam("surname", $userData["surname"], PDO::PARAM_STR);
    $statement->bindParam("email", $userData["email"], PDO::PARAM_STR);
    $statement->bindParam("id", $userId, PDO::PARAM_INT);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }

  static function delete(string $userId): bool
  {
    $pdo = Database::connect();
    $query = "DELETE FROM users WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam("id", $userId, PDO::PARAM_INT);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }

  static function softDelete(string $userId): bool
  {
    $pdo = Database::connect();
    $query = "UPDATE users SET state = :state WHERE id = :id";
    $inactiveState = "inactive";
    $statement = $pdo->prepare($query);
    $statement->bindParam("id", $userId, PDO::PARAM_INT);
    $statement->bindParam("state", $inactiveState, PDO::PARAM_STR);
    $wasSuccess = $statement->execute();
    return $wasSuccess;
  }
}
