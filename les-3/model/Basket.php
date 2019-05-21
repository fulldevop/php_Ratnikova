<?php

namespace app\model;

class Basket extends Model
{
  protected $id;
  protected $session;
  protected $id_good;
  protected $quantity;
  protected $properties = [
      'id' => false,
      'session' => false,
      'id_good' => false,
      'quantity' => false,
  ];

  public function __construct($id = null, $session = null, $id_good = null, $quantity = null)
  {
    $this->id = $id;
    $this->session = $session;
    $this->id_good = $id_good;
    $this->quantity = $quantity;
  }

  public function setSession($session)
  {
    $this->properties['session'] = true;
    $this->session = $session;
  }

  public function setIdGood($id_good)
  {
    $this->properties['id_good'] = true;
    $this->id_good = $id_good;
  }

  public function setQuantity($quantity)
  {
    $this->properties['quantity'] = true;
    $this->quantity = $quantity;
  }


  public static function getTableName()
  {
    return "basket";
  }
}