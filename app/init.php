<?php

define("SITE_PATH", "http://localhost/sk_cms/");
define("APP_PATH", str_replace("\\", "/", dirname(__FILE__)) . "/");
define("APP_RES", "http://localhost/sk_cms/app/res/");

$server = "localhost";
$user = "root";
$pass = "";
$db = "sk_cms";

require_once(APP_PATH."core/core.php");

$SK = new SK_Core($server, $user, $pass, $db);