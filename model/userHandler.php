<?php

/**
 * Returns true if login successful, false if it fails.
 */
function handleLogin($username, $password) {
    require "../util/includeHeader.php";
    require "../integration/dbHandler.php";

    return validateUser($username, $password);

}