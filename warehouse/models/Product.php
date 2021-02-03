<?php

class Product {
  private $idProduct;
  private $name;
  private $description;
  private $price;
 
  public function __construct ($idProduct, $name, $description, $price){
    $this->idProduct = $idProduct;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }

}

?>