<?php

namespace app\controllers;

use app\model\Log;
use app\engine\Request;
use app\model\repositories\BasketRepository;

class BasketController extends Controller
{
  public function actionIndex()
  {
    $basket = (new BasketRepository())->getBasket();
    echo $this->render("basket", ['basket' => $basket, 'total' => (new BasketRepository())->getTotalSum()]);
  }

  public function actionDelete()
  {
    $id = (new Request())->getParams()['id'];
    $basket = (new BasketRepository())->getOne($id);
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

      header('Content-Type: application/json');


      echo json_encode(['count' => (new BasketRepository())->getCount(), 'id' => $id,
          'quantity' => $quantity, 'total' => (new BasketRepository())->getTotalSum()]);
    }
  }

  public function actionUpdateQuantity()
  {
    $id = (new Request())->getParams()['id'];
    $quantity = (new Request())->getParams()['quantity'];

    $basket = (new BasketRepository())->getOne($id);

    if (session_id() == $basket->getSession()) {
        $basket->setQuantity($quantity);
        $basket->update();

      header('Content-Type: application/json');


      echo json_encode(['count' => (new BasketRepository())->getCount(),
          'total' => (new BasketRepository())->getTotalSum()]);
    }
  }
}