<?php

namespace app\model\entities;

class Users extends DataEntity
{
  protected $id;
  protected $login;
  protected $pass;
  protected $hash;
  public $properties = [
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

  public function setId($id)
  {
    $this->properties['id'] = true;
    $this->id = $id;
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
}
