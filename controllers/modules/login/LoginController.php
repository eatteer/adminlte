<?php
include "models/modules/login/LoginModel.php";

class LoginController
{
  private array $viewData = [];

  function __construct()
  {
    $this->viewData = [
      "loginForm" => [
        "wasSubmitted" => false,
        "errorMessage" => "",
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

  function handleLoginSubmission()
  {
    $wasSubmitted = isset($_POST["login"]);
    $this->viewData["loginForm"]["wasSubmitted"] = $wasSubmitted;
    if (!$wasSubmitted) return;

    // Validate form to set view data
    // Get submitted values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Set form values
    $this->viewData["loginForm"]["values"]["email"] = $email;
    $this->viewData["loginForm"]["values"]["password"] = $password;

    // Set form errors
    if (empty($email)) {
      $this->viewData["loginForm"]["errors"]["email"] = "Email is required";
    }

    if (empty($password)) {
      $this->viewData["loginForm"]["errors"]["password"] = "Password is required";
    }

    // FORM HAS ERRORS
    if (!empty(implode($this->viewData["loginForm"]["errors"]))) return;

    // Try to login user
    $user = LoginModel::findUserByEmail($email);

    // User does not exist or passwords do not match
    if (!$user || $password != $user["password"]) {
      $this->viewData["loginForm"]["errorMessage"] = "Email or password does not match";
      return;
    }

    $redirectionPage = "home";
    header("Location: $redirectionPage");
  }
}
