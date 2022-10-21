<?php
include "database/Database.php";

class RegisterController
{
  private array $viewData = [];

  function __construct()
  {
    $this->viewData = [
      "registerForm" => [
        "wasSubmitted" => false,
        "values" => [
          "email" => "",
          "password" => ""
        ],
        "errors" => [
          "email" => "",
          "password" => ""
        ]
      ]
    ];
  }

  function getViewData()
  {
    return $this->viewData;
  }

  function handleRegisterSubmission()
  {
    $wasSubmitted = isset($_POST["register"]);
    $this->viewData["registerForm"]["wasSubmitted"] = $wasSubmitted;
    if (!$wasSubmitted) return;

    // Validate form to set view data

    // Get submitted values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Set form values
    $this->viewData["registerForm"]["values"]["email"] = $email;
    $this->viewData["registerForm"]["values"]["password"] = $password;

    // Set form errors
    if (empty($email)) {
      $this->viewData["registerForm"]["errors"]["email"] = "Email is required";
    }

    if (empty($password)) {
      $this->viewData["registerForm"]["errors"]["password"] = "Password is required";
    }

    // Validate if user already exists

    // Register user in database

  }
}
