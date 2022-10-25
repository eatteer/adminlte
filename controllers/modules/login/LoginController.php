<?php
require_once "models/modules/login/LoginModel.php";
require_once "models/entities/UserModel.php";

use Rakit\Validation\Validator;

class LoginController
{
  private Validator $validator;
  private array $viewData;

  function __construct()
  {
    $this->validator = new Validator;

    /* Initialize view data */
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

  function getViewData(): array
  {
    return $this->viewData;
  }

  function handleLoginSubmission()
  {
    $wasSubmitted = isset($_POST["login"]);
    $this->viewData["loginForm"]["wasSubmitted"] = $wasSubmitted;

    /* If the form was not submitted just render the page */
    if (!$wasSubmitted) return;

    /* Set form values with submitted values */
    $this->viewData["loginForm"]["values"] = $_POST;

    /* Validate submitted values */
    $validation = $this->validator->validate($_POST, [
      "email" => "required|email",
      "password" => "required"
    ]);

    /* Set form errors */
    if ($validation->fails()) {
      $generatedErrors = $validation->errors()->firstOfAll();
      $errors = $this->viewData["loginForm"]["errors"];
      $this->viewData["loginForm"]["errors"] = array_merge($errors, $generatedErrors);
      return;
    }

    /* Try to log in user */
    ["email" => $submittedEmail, "password" => $submittedPassword] = $_POST;
    $user = UserModel::findActiveByEmail($submittedEmail);

    /* User does not exist or passwords do not match */
    if (!$user || $submittedPassword != $user["password"]) {
      $this->viewData["loginForm"]["errorMessage"] = "Email or password does not match";
      return;
    }

    /* Set session variables */
    session_start();
    $_SESSION["isAuthenticated"] = true;
    $_SESSION["userId"] = $user["id"];
    $_SESSION["userName"] = $user["name"];
    $_SESSION["userSurname"] = $user["surname"];

    /* Redirect to home page */
    $redirectionPage = "home";
    header("Location: $redirectionPage");
  }
}
