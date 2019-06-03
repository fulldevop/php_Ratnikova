<?php

namespace app\controllers;


use app\engine\Request;
use app\model\entities\Basket;
use app\model\Log;
use app\model\entities\Products;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;

class ProductController extends Controller
{/*
  public function actionApiCatalog() {
    $catalog = Products::getAll();

    header('Content-Type: application/json');
    echo json_encode(['goods' => $catalog], JSON_NUMERIC_CHECK |
        JSON_UNESCAPED_UNICODE);
  }*/

  public function actionIndex() {
    $catalog = (new ProductRepository())->getAll();
    echo $this->render("catalog", ['catalog' => $catalog]);
  }

  public function actionCard() {
    $id = (int)$_GET['id'];
    $product = (new ProductRepository())->getOne($id);
    echo $this->render("card", ['product' => $product]);
  }

  public function actionAddBasket() {
    $id_good = (new Request())->getParams()['id'];
//    Log::_log($id_good);
    $good = (new BasketRepository())->getOneGood('id_good', $id_good);

    if ($good) {
      $quantity = $good->getQuantity();
      $good->setQuantity($quantity + 1);
      $good->save();
    } else {
      (new BasketRepository())->save(new Basket(null, session_id(), $id_good, 1));
    }
    echo json_encode((new BasketRepository())->getCount());
  }
}