
<?php
/**
 * Created by PhpStorm.
 * User: Taoudi
 * Date: 2018-09-25
 * Time: 12:14
 */




    require "../util/includeHeader.php";
    include('../model/rfpHandler.php');


    // Requests file approval from model
    function fileHandle($file)
    {
      return  approveFile($file);
    }




