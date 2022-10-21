<?php
session_start();
$isAuthenticated = $_SESSION["isAuthenticated"] ?? false;

if (!$isAuthenticated) {
  $redirectionPage = "login";
  header("Location: $redirectionPage");
}
