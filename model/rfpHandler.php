<?php
/**
 * Created by PhpStorm.
 * User: Taoudi
 * Date: 2018-09-25
 * Time: 14:16
 */
require '../integration/dbHandler.php';
/**
 * Checks the file is of correct size, format and properly uploaded.
 * If no errors occur, then it is sent to database

 * @param $file - The file that is to be uploaded
 * @param $company - The company that sent the RFP
 * @param $name - Contact person of the company
 * @param $number - Phone Number of Contact Person
 * @param $message - Description of RFP
 * @return bool - True if success, false if error
 */
function approveFile($file){
    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($file['error']) ||
            is_array($file['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here.
        if ($file['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $finfo->file($file['tmp_name']),
                array(
                    'pdf' =>  'application/pdf',
                ),
                true
            )) {
            throw new RuntimeException('Invalid file format, only PDF allowed');
        }


    } catch (RuntimeException $e) {

        $_SESSION[error] = $e->getMessage();
        return false;

    }
return true;
}

/**
 * Stores the file in the database if it doesn't already exist
 *
 * @param $file - The file that is to be uploaded
 * @param $company - The company that sent the RFP
 * @param $name - Contact person of the company
 * @param $number - Phone Number of Contact Person
 * @param $message - Description of RFP * @return bool
 */
function sendFile($file,$company,$contactName, $number,$message){
    $exists = fileExists($company,$file['name']);
    if($exists) {
        $_SESSION[error] = "File has already been sent.";
        return false;

    }

    else {
        $sent = storeFile($file, $company, $contactName, $number, $message);
        if ($sent) {
            $_SESSION[success] = "File sent!";
            return true;
        }
        else {
            $_SESSION[error] = "File could not be sent!";
            return false;
        }
    }
    return true;
}