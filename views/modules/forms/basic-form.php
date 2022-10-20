<!-- Imports -->
<?php include "controllers/modules/forms/BasicFormController.php" ?>

<!-- Code -->
<?php
$basicForm = [];
BasicFormController::handleSubmittedBasicForm();
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
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="file">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file" name="file" required>
                      <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="check" name="check" value="true">
                  <label class="form-check-label" for="check">Check</label>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="submitBasicForm" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Modal
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
            <h4 class="modal-title">Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium tempore deleniti iusto a harum provident voluptatem eveniet! Est explicabo ipsa, iusto natus nulla quae sequi ad itaque debitis enim molestias.</p>
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
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <?php if (boolval($basicForm["values"])) : ?>
    <script>
      <?php $basicFormValues = json_encode($basicForm["values"]); ?>
      const basicFormValues = <?= $basicFormValues ?>;
      let message = "";
      for (const [key, value] of Object.entries(basicFormValues)) {
        const upperFirstKeyLetter = key[0].toUpperCase();
        const lowerRestOfKeyLetters = key.slice(1).toLowerCase();
        const capitalizedKey = `${upperFirstKeyLetter}${lowerRestOfKeyLetters}`;
        message += `${capitalizedKey}: ${value} - `;
      }
      toastr.info(message);
    </script>
  <?php endif; ?>
</body>

</html>