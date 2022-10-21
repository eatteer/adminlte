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
        <h2 class="card-title font-weight-bold">Login</h2>
      </div>
      <form class="">
        <div class="card-body">
          <div class="form-group">
            <label for="">Email</label>
            <input class="form-control" type="email" name="" id="" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input class="form-control" type="password" name="" id="" placeholder="Enter your email">
          </div>
          <a href="<?= DOMAIN . "/adminlte/register" ?>">Don't you have an account? Register</a>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Login</button>
        </div>
      </form>

    </div>

  </div>
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>