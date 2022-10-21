<?php include "models/modules/register/RegisterModel.php";

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

    // FORM HAS ERRORS
    // Do not continue with the code below the foreach
    // until the each value of the errors array is empty
    $registerFormErrors = $this->viewData["registerForm"]["errors"];
    foreach ($registerFormErrors as $key => $value) {
      if (!empty($value)) return;
    }

    // Validate if user already exists
    $doesUserExists = RegisterModel::checkIfUserWithEmailExists($email);
    if ($doesUserExists) {
      // $this->viewData["registerForm"]["errorMessage"] = "Email already exists";
      $this->viewData["registerForm"]["errors"]["email"] = "Email already exists";
      return;
    }

    // Try to register user in database
    $userData = [
      "email" => $email,
      "password" => $password
    ];

    $wasSuccess = RegisterModel::registerUser($userData);

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
