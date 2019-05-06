<?php

class Services
{
  protected $id;
  protected $name;
  protected $price;
  protected $duration;

  public function __construct($id = null, $name = null, $price = null, $duration = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->duration = $duration;
  }

  public function display()
  {
    echo $this->prepareTitle() . $this->prepareMoreInfo();
  }

  protected function prepareTitle()
  {
    return "<h1>$this->name</h1>";
  }

  protected function prepareMoreInfo()
  {
    return "<p>Стоимость: {$this->price} рублей</p> <p>Длительность процедуры: {$this->duration} минут</p>";
  }

  public function getGift()
  {
    echo "<p>Ваш купон на скидку в 15%: 'CUPON15'</p>";
  }

  public function moreServices(Services $class)
  {
    echo "<p>С вашей услугой часто заказывают: {$class->name}</p>";
  }
}

class Massage extends Services
{
  protected $area;
  protected $type;

  public function __construct($id = null, $name = null, $price = null, $duration = null, $area = null, $type = null)
  {
    parent::__construct($id, $name, $price, $duration);
    $this->area = $area;
    $this->type = $type;
  }

  public function display()
  {
    parent::display();
    echo "<p>Область массажа: {$this->area}</p> <p>Тип массажа: {$this->type}</p>";
  }

  public function getAllTypes()
  {
    echo "<p>Шведский<br> Релаксирующий<br> Гидромассаж<br> Лимфодренажный<br> Тайский<br> Испанский</p>";
  }
}

class Makeup extends Services
{
  protected $type;

  public function __construct($id = null, $name = null, $price = null, $duration = null, $type = null)
  {
    parent::__construct($id, $name, $price, $duration);
    $this->type = $type;
  }

  public function display()
  {
    parent::display();
    echo "<p>Тип макияжа: {$this->type}</p>";
  }

  public function getAllTypes()
  {
    echo "<p>Дневной<br> Вечерний<br> Smokey eyes<br> Свадебный<br> Деловой<br> Лифтинг</p>";
  }
}

function serviceCard(Services $class)
{
  $class->display();
}

$service1 = new Services(1, 'Маникюр', 700, 60);
serviceCard($service1);
$service1->getGift();

$service2 = new Massage(2, 'Массаж', 1000, 45, 'Спина', 'Шведский');
serviceCard($service2);
$service2->getGift();
$service2->getAllTypes();


$service3 = new Massage(2, 'Макияж', 800, 60, 'Дневной');
serviceCard($service3);
$service3->moreServices($service1);


echo "<br><br><br><br>";








class A {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1 // Так как стоит преинкремент, сначала увеличивается число на 1, потом показывается
$a2->foo(); // 2 // Переменная $x статичная и принадлежит классу, а не объекту. Она будет одной и той же
$a1->foo(); // 3 // для всех экземпляров класса, поэтому при каждом вызове функции (независимо, от какого
$a2->foo(); // 4 // экземпляра класса) эта переменнаая увеличивается

echo "<hr>";



class B {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class C extends B {
}
$b1 = new B();
$c1 = new C();
$b1->foo(); // 1 // Класс С наследует свою статическую переменную, которая уже независимо от родительского класса
$c1->foo(); // 1 // принадлежит классу потомка. В результате у каждого класса своя статическая переменная,
$b1->foo(); // 2 // которая при первом вызове функции равна нулю.
$c1->foo(); // 2 //

echo "<hr>";

class D {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class E extends D {
}
$d1 = new D;
$e1 = new E;
$d1->foo(); // 1 // Пример аналогичен по смыслу с предыдущим. Разница - в скобках при создании экземпляра класса.
$e1->foo(); // 1 // Если не передаются никакие параметры - можно скобки не ставить.
$d1->foo(); // 2 //
$e1->foo(); // 2 //
