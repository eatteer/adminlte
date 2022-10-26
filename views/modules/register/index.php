<!-- Imports -->
<?php
require_once "includes/home-redirection.php";
require_once "controllers/modules/register/RegisterController.php";
require_once "lib/InputInformation.php";
?>

<!-- Controller -->
<?php
$registerController = new RegisterController();
$registerController->handleRegisterSubmission();
$viewData = $registerController->getViewData();
?>

<!-- View -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE</title>
  <?php include "views/includes/required-links.php"; ?>
</head>

<body class="radial-background">
<div class="card mx-auto mt-5" style="max-width: 420px;">
  <div class="card-header">
    <h2 class="card-title font-weight-bold">Register</h2>
  </div>
  <form method="POST">
    <div class="card-body">
      <!-- Name -->
      <div class="form-group">
        <?php
        [
          $name,
          $nameError,
          $nameErrorClass
        ] = InputInformation::generateInformation(
          $viewData,
          "registerForm",
          "name"
        );
        ?>
        <label for="name">Name</label>
        <input
          class="form-control <?= $nameErrorClass; ?>"
          type="text"
          id="name"
          name="name"
          placeholder="Enter your name"
          value="<?= $name; ?>"
        >
        <div class="invalid-feedback"><?= $nameError; ?></div>
      </div>
      <!--  Surname -->
      <div class="form-group">
        <?php
        [
          $surname,
          $surnameError,
          $surnameErrorClass
        ] = InputInformation::generateInformation(
          $viewData,
          "registerForm",
          "surname"
        );
        ?>
        <label for="surname">Surname</label>
        <input
          class="form-control <?= $surnameErrorClass; ?>"
          type="text"
          id="surname"
          name="surname"
          placeholder="Enter your surname"
          value="<?= $surname; ?>"
        >
        <div class="invalid-feedback"><?= $surnameError; ?></div>
      </div>
      <!-- Email -->
      <div class="form-group">
        <?php
        [
          $email,
          $emailError,
          $emailErrorClass
        ] = InputInformation::generateInformation(
          $viewData,
          "registerForm",
          "email"
        );
        ?>
        <label for="email">Email</label>
        <input
          class="form-control <?= $emailErrorClass; ?>"
          type="email"
          id="email"
          name="email"
          placeholder="Enter your email"
          value="<?= $email; ?>">
        <div class="invalid-feedback"><?= $emailError ?></div>
      </div>
      <!--  Password -->
      <div class="form-group">
        <?php
        [
          $password,
          $passwordError,
          $passwordErrorClass
        ] = InputInformation::generateInformation(
          $viewData,
          "registerForm",
          "password"
        );
        ?>
        <label for="password">Password</label>
        <input
          class="form-control <?= $passwordErrorClass; ?>"
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          value="<?= $password; ?>">
        <div class="invalid-feedback"><?= $passwordError; ?></div>
      </div>
      <!--  Link to login -->
      <a href="<?= DOMAIN . "/adminlte/login" ?>">Do you have an account? Login</a>
      <!--  Errors message -->
      <?php $errorMessage = $viewData["registerForm"]["errorMessage"]; ?>
      <?php if ($errorMessage) : ?>
        <div class="font-weight-bold text-danger">
          <?= $errorMessage; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary" type="submit" name="register">
        <i class="fas fa-sign-in-alt mr-1"></i>
        Register
      </button>
    </div>
  </form>
</div>
<?php include "views/includes/required-scripts.php" ?>
</body>

</html>