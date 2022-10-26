<?php
session_start();
$isAuthenticated = $_SESSION["isAuthenticated"] ?? false;

ChromePhp::log($isAuthenticated);

if ($isAuthenticated) {
  $redirectionPage = "home";
  header("Location: $redirectionPage");
}
