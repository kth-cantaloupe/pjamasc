<?php
require "../util/includeHeader.php";

$username = $_POST[username];
$password = $_POST[password];

if(empty($username))
    $errorMessage = "Please input username.";
else if(empty($username))
    $errorMessage = "Please input password.";
else {
    include "../controller/loginController.php";
    $loginStatus = loginUser($username, $password);
    if(!$loginStatus)
        $errorMessage = $_SESSION[error];
}
