<?php

class Order {
  private $idOrder;
  private $orderDate;
  private $deliveryDate;
  private $idProduct;
  private $idStatus;
  private $idCustomer;
  private $idAddress;
  private $code;
 
  public function __construct ($idOrder, $orderDate, $deliveryDate, $idProduct, $idStatus, $idCustomer, $idAddress, $code) {
    $this->idOrder = $idOrder;
    $this->orderDate = $orderDate;
    $this->deliveryDate = $deliveryDate;
    $this->idProduct = $idProduct;
    $this->idStatus = $idStatus;
    $this->idCustomer = $idCustomer;
    $this->idAddress = $idAddress;
    $this->code = $code;
  }

  public function toString() {
    echo $this->idOrder.' '.$this->orderDate.' '.$this->deliveryDate.' '.$this->idProduct.' '.$this->idStatus.' '.$this->idCustomer.' '.$this->idAddress.' '.$this->code;
  }
}

?>