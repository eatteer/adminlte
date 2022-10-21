<?php
include "database/Database.php";

class LoginModel
{
  static function findUserByEmail(string $email): mixed
  {
    $pdo = Database::connect();
    $query = "SELECT id, email, password FROM users WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}
