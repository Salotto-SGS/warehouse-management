<?php

class Customer {
  private $idCustomer;
  private $name;
  private $surname;
  private $gender;
  private $birthDate;
  private $idAddress;
  private $idNumber;

  public function __construct ($idCustomer, $name, $surname, $gender, $birthDate, $idAddress, $idNumber){
    $this->idCustomer = $idCustomer;
    $this->name = $name;
    $this->surname = $surname;
    $this->gender = $gender;
    $this->birthDate = $birthDate;
    $this->idAddress = $idAddress;
    $this->idNumber = $idNumber;
  }
    


}

?>