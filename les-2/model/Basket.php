<?php

namespace app\model;

class Basket
{
  public $id;
  public $session;
  public $id_good;
  public $quantity;

  public function getTableName()
  {
    return "basket";
  }
}