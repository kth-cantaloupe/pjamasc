<?php

$username = $_POST[$usernameField];
$password = $_POST[$passwordField];
$passwordConfirm = $_POST[$passwordConfirmField];
$email = $_POST[$emailField];

if($password != $passwordConfirm)
    die("Passwords not matching");