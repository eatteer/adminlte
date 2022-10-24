<?php
include "database/Database.php";

class LoginModel
{
  static function findUserByEmail(string $email): array
  {
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam("email", $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}
