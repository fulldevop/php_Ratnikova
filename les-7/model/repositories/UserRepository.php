<?php

namespace app\model\repositories;


use app\model\entities\Users;
use app\model\Repository;

class UserRepository extends Repository
{
  public function is_auth()
  {
    if (!isset($_SESSION['login'])) {
      if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $row = $this->getAllWhere('hash', $hash);
        $user = $row['login'];
        if (!empty($user)) {
          $_SESSION['login'] = $user;
        }
      }
    }

    return isset($_SESSION['login']) ?: false;
  }

  public function authSend() {
    if (isset($_REQUEST['send'])) {
      $login = $_REQUEST['login'];
      $row = $this->getAllWhere('login', $login);
      $user = new Users;
      $user->setId($row['id']);
      $user->setLogin($row['login']);
      $user->setPass($row['pass']);

      if (!$this->auth($row)) {
        return false;
      } else {
        if (isset($_REQUEST['save'])) {
          $hash = uniqid(rand(), true);
          $user->setHash($hash);
          $this->save($user);
          $this->propertiesAllFalse($user);

          setcookie('hash', $hash, time() + 86400, '/');
        }
        $_SESSION['login'] = $login;

        return true;
      }
    } else return false;
  }

  public function auth($row)
  {
    $pass = $_REQUEST['pass'];
    return password_verify($pass, $row['pass']);
  }

  public function getUserName() {
    return !$this->is_auth() ?: $_SESSION['login'];
  }

  public function getEntityClass() {
    return Users::class;
  }

  public function getTableName()
  {
    return "users";
  }

//TODO function displayErrorAuth()
}