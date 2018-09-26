<?php

/**
 * Returns true if login successful, false if it fails.
 */
function handleLogin($username, $password) {
    require_once "../util/includeHeader.php";
    require_once "../integration/dbHandler.php";

    $row = getUser($username);
    $dbUsername = $row["user_name"];
    $dbPassword = $row["user_password"];
    return ;

}