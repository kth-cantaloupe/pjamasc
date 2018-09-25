<?php

$un = $_POST[$username];
$pw = $_POST[$password];
$pwC = $_POST[$passwordConfirm];
$em = $_POST[$email];

if($pw != $pwC)
    die("Passwords not matching");

