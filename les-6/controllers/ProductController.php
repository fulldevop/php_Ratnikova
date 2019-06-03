<?php

namespace app\controllers;


use app\engine\Request;
use app\model\Basket;
use app\model\Log;
use app\model\Products;

class ProductController extends Controller
{/*
  public function actionApiCatalog() {
    $catalog = Products::getAll();

    header('Content-Type: application/json');
    echo json_encode(['goods' => $catalog], JSON_NUMERIC_CHECK |
        JSON_UNESCAPED_UNICODE);
  }*/

  /** @good Basket */

  public function actionIndex() {
    $catalog = Products::getAll();
    echo $this->render("catalog", ['catalog' => $catalog]);
  }

  public function actionCard() {
    $id = (int)$_GET['id'];
    $product = Products::getOne($id);
    echo $this->render("card", ['product' => $product]);
  }

  public function actionAddBasket() {
    $id_good = (new Request())->getParams()['id'];
    $good = Basket::getOneGood('id_good', $id_good);

    if ($good) {
      $quantity = $good->getQuantity();
      $good->setQuantity($quantity + 1);
      $good->save();
    } else {
      (new Basket(null, session_id(), $id_good, 1))->save();
    }
    echo json_encode(Basket::getCount());
  }
}