<!-- Imports -->
<?php
include "includes/verify-authentication.php";
include "controllers/modules/account-settings/AccountSettings.php";
include "lib/InputInformation.php";
?>

<!-- Controller -->
<?php
$accountSettingController = new AccountSettingsController();
$accountSettingController->handleUpdateBasicInformationSubmission();
$viewData = $accountSettingController->getViewData();
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
              <h1 class="m-0">Account settings</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= DOMAIN . "/adminlte/home" ?>">Home</a></li>
                <li class="breadcrumb-item active">Account settings</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Header | End -->
      <!-- Content | Start -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">Basic information</div>
            <form method="POST">
              <!-- Card body | Start -->
              <div class="card-body">
                <!-- Name, Surname Row - Start -->
                <div class="row">
                  <!-- Name | Start -->
                  <?php [$name, $nameError, $nameErrorClass] = InputInformation::generateInformation($viewData, "basicInformationForm", "name"); ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control <?= $nameErrorClass ?>" type="text" id="name" name="name" value="<?= $name ?>">
                      <div class="invalid-feedback"><?= $nameError ?></div>
                    </div>
                  </div>
                  <!-- Name | End -->
                  <!-- Surname | Start -->
                  <?php [$surname, $surnameError, $surnameErrorClass] = InputInformation::generateInformation($viewData, "basicInformationForm", "surname"); ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="surname">Surname</label>
                      <input class="form-control <?= $surnameErrorClass ?>" type="text" id="surname" name="surname" value="<?= $surname ?>">
                      <div class="invalid-feedback"><?= $surnameError ?></div>
                    </div>
                  </div>
                  <!-- Surname | End -->
                </div>
                <!-- Name, Surname Row - End -->
                <!-- Email, Password Row - Start -->
                <div class="row">
                  <!-- Email | Start -->
                  <?php [$email, $emailError, $emailErrorClass] = InputInformation::generateInformation($viewData, "basicInformationForm", "email"); ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control <?= $emailErrorClass ?>" type="text" id="email" name="email" value="<?= $email ?>">
                      <div class="invalid-feedback"><?= $emailError ?></div>
                    </div>
                  </div>
                  <!-- Email | End -->
                  <!-- Password | Start -->
                  <?php [$password, $passwordError, $passwordErrorClass] = InputInformation::generateInformation($viewData, "basicInformationForm", "password"); ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input class="form-control <?= $passwordErrorClass ?>" type="password" id="password" name="password" value="<?= $password ?>">
                      <div class="invalid-feedback"><?= $passwordError ?></div>
                    </div>
                  </div>
                  <!-- Password | End -->
                </div>
                <!-- Email, Password Row - End -->
              </div>
              <!-- Card body | End -->
              <!-- Card footer | Start -->
              <div class="card-footer">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirmationModal">Update information</button>
              </div>
              <!-- Card footer | End -->
              <!-- Confirmation Modal | Start -->
              <div class="modal fade" id="confirmationModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to update your information?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="updateBasicInformation" value="Accept">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Confirmation Modal | End -->
            </form>
          </div>
        </div>
      </div>
      <!-- Content | End -->
    </div>
    <?php include "views/components/control-sidebar.php" ?>
    <?php include "views/components/footer.php" ?>
  </div>
  <!-- Wrapper | End -->
  <!-- Notification Toast | Start -->
  <?php if ($viewData["basicInformationForm"]["informationSuccessfullyUpdated"]) : ?>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
      <div class="toast hide bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
          <strong class="mr-auto">Nofitication</strong>
          <!-- <small>11 mins ago</small> -->
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          Basic information was updated successfully
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Notification Toast | End -->
  <?php include "views/includes/required-scripts.php" ?>
  <script>
    $('.toast').toast("show");
  </script>
</body>

</html>