<?php

function createConnectionDB() {
    $serverName = "localhost";
    $user = "";
    $password = "";

    $db = mysqli_connect($serverName, $user, $password);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $db;
}

function killConnectionDB(&$db) {
    mysqli_close($db);
}

// Returns username from db if found. 
function validateUser($username, $password) { // Might use hashed pws later
    $db = createConnectionDB();
    $usernameFiltered = mysqli_real_escape_string($db, $username);
    $passwordFiltered = mysqli_real_escape_string($db, $password);
    $query = "SELECT user_name FROM user WHERE user_name='$usernameFiltered' AND user_password='$passwordFiltered'";
    $result = mysqli_query($db, $query);
    $value = mysqli_fetch_object($result);
    return $value->user_name;
}

// Checks is uploaded file already exists
// If it exists return true
// If it does not exist, return false
function fileExists ($owner){

    // CODE
    // CODE
    // CODE



    return false;
}

// Stores file in database, on success return true, on fail return false
function storeFile($file,$company,$name, $number,$message){

    //CODE
    //CODE
    //CODE

    return true;

}