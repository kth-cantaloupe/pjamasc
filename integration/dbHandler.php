<?php


function createConnectionDB() {
    $serverName = "localhost";
    $user = "pjamasc";
    $password = "f2msaS9QKyplfwOh";
    $dbtype = "pjamasc";

    $db = mysqli_connect($serverName, $user, $password, $dbtype);
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

function editAboutUs($information, $columnType){
    $db = createConnectionDB();
    $informationFiltered = mysqli_real_escape_string($db, $information);
    //echo "UPDATE aboutUs SET ".$columnType." = '".$informationFiltered."' WHERE id = 1";
    $query = "UPDATE aboutus SET $columnType = '$informationFiltered' WHERE id = 1";
    $result = mysqli_query($db, $query);
}

/*** FIX THE HANDELING OF RETURNED RESULT FROM THE SQL STATEMENT*****/
function getDbData(){
  $db = createConnectionDB();
  $query = "SELECT * FROM aboutUs WHERE id = '1'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  $information = new Information($row);
  return $information;
}
