<!-- Imports -->
<?php
include "controllers/modules/login/LoginController.php";
include "lib/InputInformation.php";
?>

<!-- Controller -->
<?php
$loginController = new LoginController();
$loginController->handleLoginSubmission();
$viewData = $loginController->getViewData();
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
      <h2 class="card-title font-weight-bold">Login</h2>
    </div>
    <form method="POST">
      <div class="card-body">
        <!-- Email -->
        <?php [$email, $emailError, $emailErrorClass] = InputInformation::generateInformation($viewData, "loginForm", "email"); ?>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control <?= $emailErrorClass ?>" type="email" name="email" id="email" placeholder="Enter your email" value="<?= $email ?>">
          <div class="invalid-feedback"><?= $emailError ?></div>
        </div>
        <!--  Password -->
        <?php [$password, $passwordError, $passwordErrorClass] = InputInformation::generateInformation($viewData, "loginForm", "email"); ?>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control <?= $passwordErrorClass ?>" type="password" name="password" id="password" placeholder="Enter your password" value="<?= $password ?>">
          <div class="invalid-feedback"><?= $passwordError ?></div>
        </div>
        <!--  Link to register -->
        <a href="<?= DOMAIN . "/adminlte/register" ?>">Don't you have an account? Register</a>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary" type="submit" name="login">
          <i class="fas fa-sign-in-alt mr-1"></i>
          Login
        </button>
      </div>
    </form>
  </div>
  <!-- Error Toast | Start -->
  <?php $errorMesage = $viewData["loginForm"]["errorMessage"] ?>
  <?php if ($errorMesage) : ?>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
      <div class="toast hide bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
          <strong class="mr-auto">Error</strong>
          <!-- <small>11 mins ago</small> -->
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body"><?= $errorMesage ?></div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Error Toast | End -->
  <?php include "views/includes/required-scripts.php" ?>
  <script>
    $('.toast').toast("show");
  </script>
</body>

</html>