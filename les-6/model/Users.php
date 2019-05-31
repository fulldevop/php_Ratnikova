<?php

namespace app\model;

class Users extends DbModel
{
  protected $id;
  protected $login;
  protected $pass;
  protected $hash;
  protected $properties = [
      'id' => false,
      'login' => false,
      'pass' => false,
      'hash' => false
  ];

  //admin 123, user 1234
  public function __construct($id = null, $login = null, $pass = null, $hash = null)
  {
    $this->id = $id;
    $this->login = $login;
    $this->pass = $pass;
    $this->hash = $hash;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function getPass()
  {
    return $this->pass;
  }

  public  function getHash()
  {
    return $this->hash;
  }

  public function setLogin($login)
  {
    $this->properties['login'] = true;
    $this->login = $login;
  }

  public function setPass($pass)
  {
    $this->properties['pass'] = true;
    $this->pass = $pass;
  }

  public function setHash($hash)
  {
    $this->properties['hash'] = true;
    $this->hash = $hash;
  }

  public static function is_auth()
  {
    if (!isset($_SESSION['login'])) {
      if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $row = parent::getAllWhere('hash', $hash);
        $user = $row['login'];
        if (!empty($user)) {
          $_SESSION['login'] = $user;
        }
      }
    }

    return isset($_SESSION['login']) ?: false;
  }

  public static function authSend() {
    if (isset($_REQUEST['send'])) {
      $login = $_REQUEST['login'];
      $row = parent::getAllWhere('login', $login);
      $user = new Users;
      $user->id = $row['id'];
      $user->login = $row['login'];
      $user->pass = $row['pass'];

      if (!static::auth($row)) {
        return false;
      } else {
        if (isset($_REQUEST['save'])) {
          $hash = uniqid(rand(), true);
          $user->setHash($hash);
          $user->save();
          $user->propertiesAllFalse();

          setcookie('hash', $hash, time() + 86400, '/');
        }
        $_SESSION['login'] = $login;

        return true;
      }
    } else return false;
  }

  public static function auth($row)
  {
    $pass = $_REQUEST['pass'];
    return password_verify($pass, $row['pass']);
  }

  public static function getUserName() {
    return !static::is_auth() ?: $_SESSION['login'];
  }
  public static function getTableName()
  {
    return "users";
  }

//TODO function displayErrorAuth()
}
