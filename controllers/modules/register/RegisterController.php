<?php
require_once "models/modules/register/RegisterModel.php";
require_once "models/entities/UserModel.php";

use Rakit\Validation\Validator;

class RegisterController
{
  private Validator $validator;
  private array $viewData;

  function __construct()
  {
    $this->validator = new Validator;
    /* Initialize view data */
    $this->viewData = [
      "registerForm" => [
        "wasSubmitted" => false,
        "errorMessage" => "",
        "values" => [
          "name" => "",
          "surname" => "",
          "email" => "",
          "password" => ""
        ],
        "errors" => [
          "name" => "",
          "surname" => "",
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

  function handleRegisterSubmission()
  {
    $wasSubmitted = isset($_POST["register"]);
    $this->viewData["registerForm"]["wasSubmitted"] = $wasSubmitted;

    /* If the form was not submitted just render the page */
    if (!$wasSubmitted) return;

    /* Set form values with submitted values */
    $this->viewData["registerForm"]["values"] = $_POST;

    /* Validate submitted values */
    $validation = $this->validator->validate($_POST, [
      "name" => "required",
      "surname" => "required",
      "email" => "required|email",
      "password" => "required"
    ]);

    /* Set form errors */
    if ($validation->fails()) {
      $generatedErrors = $validation->errors()->firstOfAll();
      $errors = $this->viewData["registerForm"]["errors"];
      $this->viewData["registerForm"]["errors"] = array_merge($errors, $generatedErrors);
      return;
    }

    /* Validate if user already exists */
    ["email" => $submittedEmail] = $_POST;

    $user = UserModel::findByEmail($submittedEmail);
    if ($user) {
      $this->viewData["registerForm"]["errors"]["email"] = "The Email already exists";
      return;
    }

    /* Try to register user in database */
    $wasSuccess = UserModel::create($_POST);

    /* User could not be registered */
    if (!$wasSuccess) {
      $this->viewData["registerForm"]["errorMessage"] = "Something went wrong";
      return;
    }

    /* User successfully registered and redirect to login page */
    $redirectionPage = "login";
    header("Location: $redirectionPage");
  }
}
