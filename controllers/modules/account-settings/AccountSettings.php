<?php
include "models/entities/UserModel.php";
require("vendor/autoload.php");

use Rakit\Validation\Validator;

class AccountSettingsController
{
  private array $viewData;
  private Validator $validator;

  function __construct()
  {
    $this->validator = new Validator;
    /* Get the id of the authenticated user to find him in the database
    and initialize the form with his data */
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

    /* If the form was not submitted just render the page */
    if (!$wasSubmitted) return;

    /* Set form values with submitted values */
    $this->viewData["basicInformationForm"]["values"] = $_POST;

    /* Validate submitted values */
    $validation = $this->validator->validate($_POST, [
      "name" => "required",
      "surname" => "required",
      "email" => "required",
      "password" => "required"
    ]);

    /* Set form errors */
    if ($validation->fails()) {
      $generatedErrors = $validation->errors()->firstOfAll();
      $errors = $this->viewData["basicInformationForm"]["errors"];
      $this->viewData["basicInformationForm"]["errors"] = array_merge($errors, $generatedErrors);
      return;
    }

    /* Try to update user data */
    $userId = $_SESSION["userId"];
    $wasSuccess = UserModel::update($userId, $_POST);

    /* In case an error occurs, set an error message */
    if (!$wasSuccess) {
      $this->viewData["basicInformationForm"]["errorMessage"] = "Something went wrong";
      return;
    }

    /* If the user information update could be done, set {informationSuccessfullyUpdated}
    to true to display a toast on the view */
    $this->viewData["basicInformationForm"]["informationSuccessfullyUpdated"] = true;
  }
}
