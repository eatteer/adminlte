<?php
class BasicFormController
{
  static function handleSubmittedBasicForm()
  {
    // Make $basicForm associative array global to use
    // in the view
    global $basicForm;

    $wasSubmitted = isset($_POST["submitBasicForm"]);

    // If Basic Form was not submitted then just render the page
    if (!$wasSubmitted) return;

    /**
     * Basic Form was submitted
     */

    // Destructure text inputs
    // ["email" => $email, "password" => $password] = $_POST;

    // Text inputs
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    // Radio inputs
    // Which language are you learning?
    $language = $_POST["language"] ?? "";

    // Checkbox inputs
    // Which backend frameworks do you know?
    $nestjs = $_POST["nestjs"] ?? "false";
    $aspnetCore = $_POST["aspnetCore"] ?? "false";
    $laravel = $_POST["laravel"] ?? "false";

    // File inputs
    $file = $_FILES['file'];
    [
      'name' => $fileName,
      'size' => $fileSize,
      'tmp_name' => $fileTemporaryPath
    ] = $file;

    // ChromePhp::log($file);

    $basicForm = [
      "values" => [
        "email" => $email,
        "password" => $password,
        "fileName" => $fileName,
        "nestjs" => $nestjs,
        "aspnetCore" => $aspnetCore,
        "laravel" => $laravel,
        "language" => $language
      ],
    ];
  }
}
