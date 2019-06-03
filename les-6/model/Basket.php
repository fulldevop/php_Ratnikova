<?php

namespace app\model;

use app\engine\Db;
class Basket extends DbModel
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

  public function getId()
  {
    return $this->id;
  }

  public function getSession()
  {
    return $this->session;
  }

  public function getIdGood()
  {
    return $this->id_good;
  }

  public function getQuantity()
  {
    return $this->quantity;
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

  public static function getCount() {
    $res = static::getQuantityGoodsBasket();
    return $res;
  }

  public static function getOneGood($field, $value)
  {
    $session = session_id();
    $sql = "SELECT * FROM `basket` WHERE `session` = :session AND `$field` = :$field";
    return Db::getInstance()->queryObject($sql, ["$field" => $value, 'session' => $session], static::class);
  }

  public static function getBasket()
  {
    $session = session_id();
    $sql = "SELECT `basket`.`id`, `basket`.`id_good`, `basket`.`quantity`, `products`.`name`,
 `products`.`description`, `products`.`price` FROM `basket` INNER JOIN `products` 
 ON `basket`.`id_good` = `products`.`id` AND `basket`.`session` = :session";
    return Db::getInstance()->queryAll($sql, [':session' => $session]);
  }

  public static function getQuantityGoodsBasket()
  {
    $session = session_id();
    $sql = "SELECT SUM(`quantity`) as count FROM `basket` WHERE `session` = :param";
    return Db::getInstance()->queryOne($sql, [':param' => $session])['count'];
  }

  public static function getTableName()
  {
    return "basket";
  }
}