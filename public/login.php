<?php
require_once "../util/includeHeader.php";

if(isset($_POST[username]) && isset($_POST[password])) {
    $username = $_POST[username];
    $password = $_POST[password];
}

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

?>
<form action="login.php" method="post">
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="password" name="password"><br><br>
    <input type="submit" value="Submit">
</form>

