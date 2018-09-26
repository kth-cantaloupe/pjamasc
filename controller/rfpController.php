
<?php
/**
 * Created by PhpStorm.
 * User: Taoudi
 * Date: 2018-09-25
 * Time: 12:14
 */

    include('../model/rfpHandler.php');


    // Requests file approval from model
    function fileHandle($file,$company,$name, $number, $number,$message)
    {
      $approved  =  approveFile($file,$company,$name, $number, $number,$message);

        if ($approved == true)
            return sendFile($file,$company,$name, $number, $number,$message);
        else
           return false;
    }




