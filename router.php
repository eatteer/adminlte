<?php
$path = $_GET["path"] ?? "login";
// URN -> Uniform Resource Name
// $urns = explode("/", $path);
// $page = $urns[0];
$page = $path;

switch ($page) {
  case "login":
    include "views/modules/login/index.php";
    break;
  case "logout":
    include "views/modules/logout/index.php";
    break;
  case "register":
    include "views/modules/register/index.php";
    break;
  case "home":
    include "views/modules/home/index.php";
    break;
  case "account-settings":
    include "views/modules/account-settings/index.php";
    break;
  case "forms/basic-form":
    include "views/modules/forms/basic-form.php";
    break;
  case "forms/advanced-form":
    include "views/modules/forms/advanced-form.php";
    break;
  case "contact":
    include "views/modules/contact/index.php";
    break;
  default:
    echo "Provisional 404";
    break;
}
?>

<script>
  const url = window.location;
  const allLinks = document.querySelectorAll('.nav-item a');
  const currentLinks = [...allLinks].filter(e => url.href.includes(e.href));

  currentLinks.forEach(currentLink => {
    currentLink.classList.add("active");
    // {currentLink} -> a
    // {currentLink.parentElement} -> li
    if (currentLink.parentElement.querySelector(".nav-treeview")) {
      currentLink.parentElement.classList.add("menu-is-opening");
      currentLink.parentElement.classList.add("menu-open");
      currentLink.parentElement.querySelector("ul").style.display = "block";
    }
  })
</script>