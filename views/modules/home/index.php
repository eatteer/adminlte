<!-- Imports -->
<?php require_once "includes/verify-authentication.php"; ?>

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
  <!-- Wrapper | Start -->
  <div class="wrapper">
    <?php include "views/components/navbar.php" ?>
    <?php include "views/components/aside.php" ?>
    <div class="content-wrapper">
      <!-- Content Header | Start -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Home</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Header | End -->
      <!-- Content | Start -->
      <div class="content">
        <div class="container-fluid">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi officiis numquam deleniti commodi distinctio ratione ducimus architecto libero odio ipsa nam nobis, unde blanditiis? Suscipit eum ab assumenda recusandae ipsam!</p>
        </div>
      </div>
      <!-- Content | End -->
    </div>
    <?php include "views/components/control-sidebar.php" ?>
    <?php include "views/components/footer.php" ?>
  </div>
  <!-- Wrapper | End -->
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>