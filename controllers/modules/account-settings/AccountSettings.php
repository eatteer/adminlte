<?php
include "models/entities/UserModel.php";
require("vendor/autoload.php");

use Rakit\Validation\Validator;

class AccountSettingsController
{
  private array $viewData = [];
  private Validator $validator;

  function __construct()
  {
    /**
     * Get the id of the authenticated user
     * to find him in the database and initialize the form
     * with his data
     */
    $this->validator = new Validator;
    $userId = $_SESSION["userId"];
    $user = UserModel::findById($userId);
    $this->viewData = [
      "basicInformationForm" => [
        "wasSubmitted" => false,
        "informationSuccessfullyUpdated" => false,
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

  function getViewData(): array
  {
    return $this->viewData;
  }

  function handleUpdateBasicInformationSubmission()
  {
    $wasSubmitted = isset($_POST["updateBasicInformation"]);
    $this->viewData["basicInformationForm"]["wasSubmitted"] = $wasSubmitted;


    /**
     * If the form was not submitted just render the page
     */
    if (!$wasSubmitted) return;

    $validation = $this->validator->validate($_POST, [
      "name" => "required",
      "surname" => "required",
      "email" => "required",
      "password" => "required"
    ]);

    if ($validation->fails()) {
      $errors = $validation->errors();
      ChromePhp::log(json_encode($errors->firstOfAll()));
    }

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
    // until the value of the errors array is empty
    $registerFormErrors = $this->viewData["basicInformationForm"]["errors"];
    foreach ($registerFormErrors as $key => $value) {
      if (!empty($value)) return;
    }

    /**
     * Update the user data with the submitted data
     */
    $userData = [
      "name" => $name,
      "surname" => $surname,
      "email" => $email,
      "password" => $password
    ];
    $userId = $_SESSION["userId"];
    $wasSuccess = UserModel::update($userId, $userData);

    /**
     * In case an error occurs, set an error message
     */
    if (!$wasSuccess) {
      $this->viewData["basicInformationForm"]["errorMessage"] = "Something went wrong";
      return;
    }

    /**
     * If the user information update could be done, set {informationSuccessfullyUpdated}
     * to true to display a toast on the view
     */
    $this->viewData["basicInformationForm"]["informationSuccessfullyUpdated"] = true;
  }
}
