<?php

$path = $_GET["path"] ?? "home";
// URN -> Uniform Resource Name
// $urns = explode("/", $path);
// $page = $urns[0];
$page = $path;

switch ($page) {
  case 'home':
    include "views/modules/home.php";
    break;
  case 'forms/basic-form':
    include "views/modules/forms/basic-form.php";
    break;
  case 'forms/advanced-form':
    include "views/modules/forms/advanced-form.php";
    break;
  case 'contact':
    include "views/modules/contact.php";
    break;
  default:
    echo "Provisional 404";
    break;
}
