<?php include "controllers/modules/register/RegisterController.php"; ?>

<?php
$registerController = new RegisterController();
$registerController->handleRegisterSubmission();
$viewData = $registerController->getViewData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE</title>
  <?php include "views/includes/required-links.php"; ?>
</head>

<body>
  <div class="wrapper">
    <div class="card mx-auto mt-5" style="max-width: 320px;">
      <div class="card-header">
        <h2 class="card-title font-weight-bold">Register</h2>
      </div>
      <form method="POST">
        <div class="card-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
          </div>
          <a href="<?= DOMAIN . "/adminlte/login" ?>">Do you have an account? Login</a>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit" name="register">Register</button>
        </div>
      </form>
    </div>

  </div>
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>