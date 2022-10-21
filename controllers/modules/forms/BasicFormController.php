<?php
class BasicFormController
{
  private array $viewData = [];

  // public function __construct()
  // {
  //   $this->viewData = [
  //     "basicForm" => [
  //       "wasSubmitted" => false,
  //       "values" => [
  //         "email" => "",
  //         "password" => "",
  //         "lore" => "",
  //         "fileName" => "",
  //         "anime" => "",
  //         "nestjs" => "",
  //         "aspnetCore" => "",
  //         "laravel" => "",
  //         "language" => ""
  //       ]
  //     ]
  //   ];
  // }

  function getViewData()
  {
    return $this->viewData;
  }

  function handleSubmittedBasicForm()
  {
    // If form was not submitted then just render the page
    $wasSubmitted = isset($_POST["submitBasicForm"]);
    $this->viewData["basicForm"]["wasSubmitted"] = $wasSubmitted;
    if (!$wasSubmitted) return;

    // Submitted form
    // Text inputs
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    // Textarea input
    $lore = $_POST["lore"] ?? "";
    // Select input
    $anime = $_POST["anime"] ?? "";
    // File input
    $file = $_FILES['file'];
    $fileName = $file["name"] ?? "";
    // Radio inputs
    $language = $_POST["language"] ?? "";
    // Check inputs
    $nestjs = $_POST["nestjs"] ?? "false";
    $aspnetCore = $_POST["aspnetCore"] ?? "false";
    $laravel = $_POST["laravel"] ?? "false";


    // Set data for the view
    $this->viewData["basicForm"]["values"] = [
      "email" => $email,
      "password" => $password,
      "fileName" => $fileName,
      "lore" => $lore,
      "anime" => $anime,
      "nestjs" => $nestjs,
      "aspnetCore" => $aspnetCore,
      "laravel" => $laravel,
      "language" => $language
    ];
  }
}
