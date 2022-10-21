<?php

class LogoutController
{
  function logout()
  {
    session_destroy();
    $redirectionPage = "login";
    header("Location: $redirectionPage");
  }
}
