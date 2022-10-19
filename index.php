<?php
include "ChromePhp.php";

$serverName = $_SERVER["SERVER_NAME"];
$isHttps = isset($_SERVER["HTTPS"]);
$domain = $isHttps ? "https://$serverName" : "http://$serverName";

define("DOMAIN", $domain);

// Render the requested page
include "router.php";
