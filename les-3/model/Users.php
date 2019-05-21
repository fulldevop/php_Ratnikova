<?php
namespace app\model;

class Users extends Model
{
  protected $id;
  protected $login;
  protected $pass;
  protected $properties = [
      'id' => false,
      'login' => false,
      'pass' => false,
  ];

  public function __construct($id = null, $login = null, $pass = null)
  {
    $this->id = $id;
    $this->login = $login;
    $this->pass = $pass;
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

  public function propertiesAllFalse() {
    $this->properties['id'] = false;
    $this->properties['login'] = false;
    $this->properties['pass'] = false;
  }

  public static function getTableName()
  {
    return "users";
  }
}