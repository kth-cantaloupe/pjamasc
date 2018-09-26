<?php
require '../views/modules/rfpForm.html';
require '../controller/rfpController.php';


// When form is sent, the $_FILES['file'] param is set and a file-handling request it sent to the controller.
// If the returned variable is false, there has occured an error with the file upload
// Else it has been successful and it has been stored in the rfp-folder.

if(isset($_FILES['file'])) {
    if ( fileHandle($_FILES['file']) == false) echo "error";
    else echo "success";
}