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
      <!-- Content Header | Start -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Module name here</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= DOMAIN . "/adminlte/home" ?>">Home</a></li>
                <li class="breadcrumb-item active">Module name here</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Header | End -->
      <!-- Content | Start -->
      <div class="content">
        <div class="container-fluid">
          <!-- CONTENT HERE -->
        </div>
      </div>
      <!-- Content | End -->
    </div>
    <?php include "views/components/control-sidebar.php" ?>
    <?php include "views/components/footer.php" ?>
  </div>
  <?php include "views/includes/required-scripts.php" ?>
</body>

</html>