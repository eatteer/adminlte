<?php
include "models/modules/register/RegisterModel.php";
include "models/entities/UserModel.php";

class RegisterController
{
  private array $viewData = [];

  function __construct()
  {
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
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Set form values
    $this->viewData["registerForm"]["values"]["name"] = $name;
    $this->viewData["registerForm"]["values"]["surname"] = $surname;
    $this->viewData["registerForm"]["values"]["email"] = $email;
    $this->viewData["registerForm"]["values"]["password"] = $password;

    // Set form errors
    if (empty($name)) {
      $this->viewData["registerForm"]["errors"]["name"] = "Name is required";
    }

    if (empty($surname)) {
      $this->viewData["registerForm"]["errors"]["surname"] = "Surname is required";
    }

    if (empty($email)) {
      $this->viewData["registerForm"]["errors"]["email"] = "Email is required";
    }

    if (empty($password)) {
      $this->viewData["registerForm"]["errors"]["password"] = "Password is required";
    }

    // FORM HAS ERRORS
    // Do not continue with the code below the foreach
    // until the each value of the errors array is empty
    $registerFormErrors = $this->viewData["registerForm"]["errors"];
    foreach ($registerFormErrors as $key => $value) {
      if (!empty($value)) return;
    }

    // Validate if user already exists
    $user = UserModel::findUserByEmail($email);
    if ($user) {
      // $this->viewData["registerForm"]["errorMessage"] = "Email already exists";
      $this->viewData["registerForm"]["errors"]["email"] = "Email already exists";
      return;
    }

    // Try to register user in database
    $userData = [
      "name" => $name,
      "surname" => $surname,
      "email" => $email,
      "password" => $password
    ];

    $wasSuccess = UserModel::create($userData);

    // User could not be registered
    if (!$wasSuccess) {
      $this->viewData["registerForm"]["errorMessage"] = "Something went wrong";
      return;
    }

    // User registered successfully
    $redirectionPage = "login";
    header("Location: $redirectionPage");
  }
}
