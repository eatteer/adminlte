<?php
require_once "controllers/modules/logout/LogoutController.php";

session_start();
$logoutController = new LogoutController();
$logoutController->logout();
