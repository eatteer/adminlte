<?php
include "controllers/modules/logout/LogoutController.php";

session_start();
$logoutController = new LogoutController();
$logoutController->logout();
