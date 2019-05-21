<?php
namespace app\model;

class Users extends DbModel
{
  protected $id;
  protected $login;
  protected static $pass;
  protected static $current_key;
  protected static $cookie_key;
  protected static $session_key;
  protected static $allow = false;
  protected $properties = [
      'id' => false,
      'login' => false,
      'pass' => false,
  ];

  public function __construct($id = null, $login = null, $pass = null)
  {
    $this->id = $id;
    $this->login = $login;
    static::$pass = $pass;
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
    return static::$pass;
  }

  public function getCurrentKey()
  {
    return static::$current_key;
  }

  public function getCookieKey()
  {
    return static::$cookie_key;
  }

  public function getSessionKey()
  {
    return static::$session_key;
  }

  public function isAllow()
  {
    return static::$allow;
  }

  public function setLogin($login)
  {
    $this->properties['login'] = true;
    $this->login = $login;
  }
  public function setPass($pass)
  {
    $this->properties['pass'] = true;
    static::$pass = $pass;
  }

  public function propertiesAllFalse() {
    $this->properties['id'] = false;
    $this->properties['login'] = false;
    $this->properties['pass'] = false;
  }

  public static function is_auth() {

  }

  public static function getTableName()
  {
    return "users";
  }
}
