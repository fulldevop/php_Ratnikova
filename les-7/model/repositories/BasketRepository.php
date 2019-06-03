<?php

namespace app\model\repositories;


use app\model\Repository;
use app\model\entities\Basket;

class BasketRepository extends Repository
{
  public function getCount() {
    $res = static::getQuantityGoodsBasket();
    return $res;
  }

  public function getOneGood($field, $value)
  {
    $session = session_id();
    $sql = "SELECT * FROM `basket` WHERE `session` = :session AND `$field` = :$field";
    return $this->db->queryObject($sql, ["$field" => $value, 'session' => $session], static::class);
  }

  public function getBasket()
  {
    $session = session_id();
    $sql = "SELECT `basket`.`id`, `basket`.`id_good`, `basket`.`quantity`, `products`.`name`,
 `products`.`description`, `products`.`price` FROM `basket` INNER JOIN `products` 
 ON `basket`.`id_good` = `products`.`id` AND `basket`.`session` = :session";
    return $this->db->queryAll($sql, [':session' => $session]);
  }

  public function getQuantityGoodsBasket()
  {
    $session = session_id();
    $sql = "SELECT SUM(`quantity`) as count FROM `basket` WHERE `session` = :param";
    return $this->db->queryOne($sql, [':param' => $session])['count'];
  }

  public function getTotalSum()
  {
    $session = session_id();
    $sql = "SELECT SUM(`basket`.`quantity` * `products`.`price`) as sum 
FROM `basket` INNER JOIN `products` 
ON `basket`.`id_good` = `products`.`id` 
WHERE `basket`.`session` = :session";
    return $this->db->queryOne($sql, [':session' => $session])['sum'];
  }

  public function getEntityClass() {
    return Basket::class;
  }

  public function getTableName()
  {
    return "basket";
  }
}