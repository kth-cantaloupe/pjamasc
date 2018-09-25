<?php
require "../util/includeHeader.php";

$username = $_POST[$username];
$password = $_POST[$password];

if(empty($username))
    $_SESSION[$error] = "Please input username.";
else if(empty($username))
    $_SESSION[$error] = "Please input password.";
else {
    include "../model/userHandler.php";
    loginUser($username, $password);
}

require "../views/login.php";