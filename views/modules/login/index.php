<!-- Imports -->
<?php include "controllers/modules/login/LoginController.php" ?>

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
        <!-- 
            Email
           -->
        <?php
        $email = $viewData["loginForm"]["values"]["email"];
        $emailError = $viewData["loginForm"]["errors"]["email"];
        $isEmailError = $emailError ? "is-invalid" : null;
        ?>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control <?= $isEmailError ?>" type="email" name="email" id="email" placeholder="Enter your email" value="<?= $email ?>">
          <div class="invalid-feedback"><?= $emailError ?></div>
        </div>
        <!-- 
            Password
           -->
        <?php
        $password = $viewData["loginForm"]["values"]["password"];
        $passwordError = $viewData["loginForm"]["errors"]["password"];
        $isPasswordError = $passwordError ? "is-invalid" : null;
        ?>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control <?= $isPasswordError ?>" type="password" name="password" id="password" placeholder="Enter your password" value="<?= $password ?>">
          <div class="invalid-feedback"><?= $passwordError ?></div>
        </div>
        <!-- 
            Errors message
           -->
        <?php if ($viewData["loginForm"]["errorMessage"]) : ?>
          <div class="font-weight-bold text-danger">
            <?= $viewData["loginForm"]["errorMessage"]; ?>
          </div>
        <?php endif; ?>
        <!-- 
            Link to register
           -->
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
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>