<?php
require_once "controllers/modules/logout/LogoutController.php";
require_once "models/entities/UserModel.php";

use Rakit\Validation\Validator;

class AccountSettingsController
{
  private Validator $validator;
  private array $viewData;

  function __construct()
  {
    $this->validator = new Validator;
    /* Get the id of the authenticated user to find him in the database
    and initialize the form with his data */
    $userId = $_SESSION["userId"];
    $user = UserModel::findById($userId);
    /* Initialize view data */
    $this->viewData = [
      "errorMessage" => "",
      "basicInformationForm" => [
        "wasSubmitted" => false,
        "informationSuccessfullyUpdated" => false,
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
      ],
      "deleteAccountForm" => [
        "wasSubmitted" => false
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

    /* Validate if user already exists */
    ["email" => $submittedEmail] = $_POST;

    $user = UserModel::findByEmail($submittedEmail);

    if ($user) {
      $this->viewData["basicInformationForm"]["errors"]["email"] = "The Email already exists";
      return;
    }

    /* Try to update user data */
    $userId = $_SESSION["userId"];
    $wasSuccess = UserModel::update($userId, $_POST);

    /* In case an error occurs, set an error message */
    if (!$wasSuccess) {
      $this->viewData["errorMessage"] = "Something went wrong";
      return;
    }

    /* If the user information update could be done, set {informationSuccessfullyUpdated}
    to true to display a toast on the view */
    $this->viewData["basicInformationForm"]["informationSuccessfullyUpdated"] = true;
  }

  function handleDeleteAccountSubmission()
  {
    $wasSubmitted = isset($_POST["deleteAccount"]);
    $this->viewData["deleteAccountForm"]["wasSubmitted"] = $wasSubmitted;

    /* If the form was not submitted just render the page */
    if (!$wasSubmitted) return;

    /* Try to delete user from database */
    $userId = $_SESSION["userId"];
    $wasSuccess = UserModel::softDelete($userId);

    /* In case an error occurs, set an error message */
    if (!$wasSuccess) {
      $this->viewData["errorMessage"] = "Something went wrong";
      return;
    }

    $redirectionPage = "logout";
    header("Location: $redirectionPage");
  }
}
