<?php /** @noinspection SqlResolve */

function createConnectionDB() {
    $serverName = "localhost";
    $user = "root";
    $password = "";
    $dbName = "pjamasc";

    $db = mysqli_connect($serverName, $user, $password, $dbName);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $db;
}

function killConnectionDB(&$db) {
    mysqli_close($db);
}

// Returns username and hashed pw from db if found.
function getUser($username) {
    $db = createConnectionDB();

    $usernameFiltered = mysqli_real_escape_string($db, $username);
    $query = "SELECT user_name, user_password FROM user WHERE user_name='$usernameFiltered'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 0) {
        echo "No user found";
        return "";
    } else {
        return mysqli_fetch_assoc($result);
    }

}