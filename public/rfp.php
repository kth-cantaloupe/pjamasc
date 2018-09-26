<?php
require '../views/modules/rfpForm.html';
require '../controller/rfpController.php';
require '../util/includeHeader.php';


// When form is sent, the $_FILES['file'] param is set and a file-handling request it sent to the controller.
// If the returned variable is false, there has occured an error with the file upload
// Else it has been successful and it has been stored in the rfp-folder.

if(isset($_FILES[file]) && isset($_POST[companyName]) && isset($_POST[firstName]) &&
    isset($_POST[lastName]) && isset($_POST[phoneNumber]) && isset($_POST[email]) && isset($_POST[message])) {
    if (fileHandle($_FILES[file], $_POST[companyName], $_POST[firstName]." ".$_POST[lastName],$_POST[phoneNumber],
            $_POST[email],$_POST[message]) == false) {
        // On fail
        echo $_SESSION[error];
        $_SESSION[success] = "";
    }
    // On succsess
    else {
        echo $_SESSION[success];
        $_SESSION[success] ="";
    }
}