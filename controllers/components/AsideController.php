<?php
require_once "models/entities/UserModel.php";

class AsideController
{
  private array $viewData;

  public function __construct()
  {
    $this->viewData = [
      "user" => []
    ];
  }

  public function getViewData(): array
  {
    return $this->viewData;
  }

  function handleOnRender()
  {
    $userId = $_SESSION["userId"];
    $user = UserModel::findById($userId);
    $this->viewData["user"] = $user;
  }
}