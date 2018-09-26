<?php
require_once "../util/includeHeader.php";

function loginUser($username, $password)
{

    include "../model/userHandler.php";
    $user = handleLogin($username, $password);

    if(!empty($user)) {
        $_SESSION[username] = $user;
        return true;
    } else {
        $_SESSION[error] = "Username or password incorrect.";
        return false;
    }
}
