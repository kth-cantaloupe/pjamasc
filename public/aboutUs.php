<?php
  require "../util/includeHeader.php";
  require "../views/modules/aboutUsForm.html";
  require "../controller/aboutUsController.php";

  $data = getAboutUsData();
  $dbDescription = $data->description;
  $dbTelephone = $data->telephone;
  $dbEmail = $data->email;
  $dbAddress = $data->address;

  if (isset($_POST[description])) {
    if ($_POST[description] == "") {
      echo "Please fill out the information you want to change";
    } else {
      changeAboutUs($_POST[description], description);
    }
  } elseif (isset($_POST[telephone])){
    if ($_POST[telephone] == "") {
      echo "Please fill out the information you want to change";
    } else {
      changeAboutUs($_POST[telephone], telephone);
    }
  } elseif (isset($_POST[email])) {
    if ($_POST[email] == "") {
      echo "Please fill out the information you want to change";
    } else {
      changeAboutUs($_POST[email], email);
    }
  } elseif (isset($_POST[address])) {
    if ($_POST[address] == "") {
      echo "Please fill out the information you want to change";
    } else {
      changeAboutUs($_POST[address], address);
    }
  }
