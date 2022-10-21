<!-- Imports -->
<?php include "includes/verify-authentication.php"; ?>

<!-- View -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE</title>
  <?php include "views/includes/required-links.php"; ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include "views/components/navbar.php" ?>
    <?php include "views/components/aside.php" ?>
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid pt-3">
          <h1>Home</h1>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi officiis numquam deleniti commodi distinctio ratione ducimus architecto libero odio ipsa nam nobis, unde blanditiis? Suscipit eum ab assumenda recusandae ipsam!</p>
        </div>
      </div>
    </div>
    <?php include "views/components/control-sidebar.php" ?>
    <?php include "views/components/footer.php" ?>
  </div>
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>