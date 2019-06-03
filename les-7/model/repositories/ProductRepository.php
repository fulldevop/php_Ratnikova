<?php

namespace app\model\repositories;


use app\model\Repository;
use app\model\entities\Products;

class ProductRepository extends Repository
{
  public function formatPrice($price) {
    return number_format($price, 0, '', ' ');
  }

  public function getEntityClass() {
    return Products::class;
  }

  public function getTableName() {
    return "products";
  }
}