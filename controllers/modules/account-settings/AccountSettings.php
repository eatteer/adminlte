<?php
include "models/entities/UserModel.php";

class AccountSettingsController
{
  private array $viewData = [];

  function __construct()
  {
    $userId = $_SESSION["userId"];
    $user = UserModel::findById($userId);
    $this->viewData = [
      "basicInformationForm" => [
        "wasSubmitted" => false,
        "errorMessage" => "",
        "values" => [
          "name" => $user["name"],
          "surname" => $user["surname"],
          "email" => $user["email"],
          "password" => $user["password"]
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

  function handleUpdateBasicInformationSubmission()
  {
    $wasSubmitted = isset($_POST["updateBasicInformation"]);
    $this->viewData["basicInformationForm"]["wasSubmitted"] = $wasSubmitted;
    if (!$wasSubmitted) return;

    // Validate form to set view data
    // Get submitted values
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Set form values
    $this->viewData["basicInformationForm"]["values"]["name"] = $name;
    $this->viewData["basicInformationForm"]["values"]["surname"] = $surname;
    $this->viewData["basicInformationForm"]["values"]["email"] = $email;
    $this->viewData["basicInformationForm"]["values"]["password"] = $password;

    // Set form errors
    if (empty($name)) {
      $this->viewData["basicInformationForm"]["errors"]["name"] = "Name is required";
    }

    if (empty($surname)) {
      $this->viewData["basicInformationForm"]["errors"]["surname"] = "Surname is required";
    }

    if (empty($email)) {
      $this->viewData["basicInformationForm"]["errors"]["email"] = "Email is required";
    }

    if (empty($password)) {
      $this->viewData["basicInformationForm"]["errors"]["password"] = "Password is required";
    }

    // FORM HAS ERRORS
    // Do not continue with the code below the foreach
    // until the each value of the errors array is empty
    $registerFormErrors = $this->viewData["basicInformationForm"]["errors"];
    foreach ($registerFormErrors as $key => $value) {
      if (!empty($value)) return;
    }

    echo "<script>alert('No errors, user can be updated')</script>";
  }
}
