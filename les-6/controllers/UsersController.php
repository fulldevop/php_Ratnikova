<?php

namespace app\controllers;

use app\model\Users;

class UsersController extends Controller
{
  public function actionLogin() {

    if (!Users::authSend()) {
      die('Неверный логин пароль');
      //TODO Users::displayErrorAuth();
    }
    header("Location: /");
  }
  public function actionLogout() {
    session_destroy();
    setcookie('hash');
    header("Location: /");
  }
}