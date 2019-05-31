<?php

namespace app\controllers;

use app\model\Basket;
use app\model\Log;
use app\engine\Request;

class BasketController extends Controller
{
  public function actionIndex()
  {
    $basket = Basket::getBasket();
    echo $this->render("basket", ['basket' => $basket]);
  }

  public function actionDelete()
  {
    $id = (new Request())->getParams()['id'];
    $basket = Basket::getOne($id);
    $quantity = $basket->getQuantity();

    if (session_id() == $basket->getSession()) {
      if ($quantity == 1) {
        $basket->delete();
        $quantity = 0;
      } else {
        $basket->setQuantity($quantity - 1);
        $basket->update();
        $quantity = $basket->getQuantity();
      }
      Log::_log($quantity);

      header('Content-Type: application/json');
//      Log::_log(Basket::getCount(), 'basket');


      echo json_encode(['count' => Basket::getCount(), 'id' => $id, 'quantity' => $quantity]);
    }
  }

}