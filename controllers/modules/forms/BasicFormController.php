<?php
class BasicFormController
{
  static function handleSubmittedBasicForm()
  {
    global $basicForm;
    
    $wasSubmitted = isset($_POST["submitBasicForm"]);

    // If Quick Example Form was not submitted then just render the page
    if (!$wasSubmitted) return;

    /**
     * Quick Example Form was submitted
     */

    // Destructure text inputs
    ["email" => $email, "password" => $password] = $_POST;

    $file = $_FILES['file'];
    // Destructure file information
    [
      'name' => $fileName,
      'size' => $fileSize,
      'tmp_name' => $fileTemporaryPath
    ] = $file;

    // ChromePhp::log($file);

    $check = isset($_POST["check"]) ? "true" : "false";

    $basicForm = [
      "values" => [
        "email" => $email,
        "password" => $password,
        "fileName" => $fileName,
        "check" => $check
      ]
    ];
  }
}
