<!-- Imports -->
<?php include "controllers/modules/forms/BasicFormController.php" ?>

<!-- Code -->
<?php
$basicFormController = new BasicFormController();
$basicFormController->handleSubmittedBasicForm();
$viewData = $basicFormController->getViewData();
?>

<!-- View -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE</title>
  <?php include "views/includes/required-links.php"; ?>
  <link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include "views/components/navbar.php" ?>
    <?php include "views/components/aside.php" ?>
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid pt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Basic Form</h3>
            </div>
            <form method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <p>Inputs are not validated</p>
                <!-- Email Text Input -->
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <!-- Password Password Input-->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <!-- Jojo Lore Textarea Input -->
                <div class="form-group">
                  <label for="lore">Jojo no Kimyo na Boken</label>
                  <textarea class="form-control" rows="3" placeholder="Enter the lore" id="lore" name="lore"></textarea>
                </div>
                <!-- File Input -->
                <div class="form-group">
                  <label for="file">File input</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="file">Choose file</label>
                  </div>
                </div>
                <!-- Favorite Anime Select -->
                <div class="form-group">
                  <label for="name">Select your favorite anime</label>
                  <select class="form-control" id="anime" name="anime">
                    <option value="none">None</option>
                    <option value="onePunchMan">One Punch Man</option>
                    <option value="kimetsuNoYaiba">Kimetsu no Yaiba</option>
                    <option value="shokugekiNoSoma">Shokugeki no Soma</option>
                    <option value="mobPsycho">Mob Psycho</option>
                  </select>
                </div>
                <!-- Framework Checkbox Input -->
                <div class="form-group">
                  <label>Which backend frameworks do you know?</label>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="nestjs" name="nestjs" value="true">
                    <label class="form-check-label" for="check">NestJS</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="aspnetCore" name="aspnetCore" value="true">
                    <label class="form-check-label" for="check">ASP.NET Core</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="laravel" name="laravel" value="true">
                    <label class="form-check-label" for="check">Laravel</label>
                  </div>
                </div>
                <!-- Language Radio Input -->
                <div class="form-group">
                  <label>Which language are you learning?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="language" value="javascript">
                    <label class="form-check-label">JavaScript</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="language" value="php">
                    <label class="form-check-label">PHP</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="language" value="java">
                    <label class="form-check-label">Java</label>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="submitBasicForm" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" <?= $viewData["basicForm"]["wasSubmitted"] ? null : "disabled"; ?>>
                  View submitted data
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include "views/components/control-sidebar.php" ?>
    <?php include "views/components/footer.php" ?>

    <!-- Overlays -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Submitted data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php foreach ($viewData["basicForm"]["values"] as $key => $value) : ?>
              <p><?= ucfirst($key) ?>: <?= $value ?></p>
            <?php endforeach; ?>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "views/includes/required-scripts.php" ?>
  <script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="/adminlte/plugins/toastr/toastr.min.js"></script>
  <script src="/adminlte/lib/string-utils.js"></script>
  <!-- Script to config file inputs -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <!-- Send script conditionally -->
  <?php if ($viewData["basicForm"]["values"] && $viewData["basicForm"]["wasSubmitted"]) : ?>
    <script>
      $('#modal-default').modal("show");
      toastr.info("Data sent to server");
    </script>
  <?php endif; ?>
</body>

</html>