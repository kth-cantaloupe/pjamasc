<?php

class Information{

    public $description;
    public $telephone;
    public $email;
    public $address;

    function __construct($row){
      $this->description = $row["description"];
      $this->telephone = $row["telephone"];
      $this->email = $row["email"];
      $this->address = $row["address"];
    }
}
