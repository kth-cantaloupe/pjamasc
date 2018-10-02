<?php
/**
 * Created by Atom.
 * User: Peter
 * Date: 2018-09-26
 * Time: 09:26
 */
  include "../integration/dbHandler.php";

  //send request for change to intergration layer
  function changeAboutUS ($information, $type) {
    editAboutUs($information, $type);
  }

  //collect information from intergration about company
  function getAboutUsData(){
    $result = getDbData();
    return $result;
  }
