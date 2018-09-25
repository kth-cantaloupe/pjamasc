<?php

$username = $_POST[$usernameField];
$password = $_POST[$passwordField];
$passwordConfirm = $_POST[$passwordConfirmField];
$email = $_POST[$emailField];

if($password != $passwordConfirm)
    die("Passwords not matching");

/** Returns true if login successful, false if it fails.
 * @param $username name of user
 * @param $password password of user
 */
function loginUser($username, $password) {

}