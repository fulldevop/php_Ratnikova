<?php

namespace app\controllers;

use app\model\repositories\UserRepository;

class UsersController extends Controller
{
  public function actionLogin() {

    if (!(new UserRepository())->authSend()) {
      die('Неверный логин пароль');
      //TODO (new UserRepository())->displayErrorAuth();
    }
    header("Location: /");
  }
  public function actionLogout() {
    session_destroy();
    setcookie('hash');
    header("Location: /");
  }
}