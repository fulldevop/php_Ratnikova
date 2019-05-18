<?php
namespace app\model;

class Products extends Model
{
  protected $id;
  protected $name;
  protected $description;
  protected $price;
  protected $properties = [
      'id' => false,
      'name' => false,
      'description' => false,
      'price' => false
  ];

  public function __construct($id = null, $name = null, $description = null, $price = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }

  public function setName($name)
  {
    $this->properties['name'] = true;
    $this->name = $name;
  }

  public function setDescription($description)
  {
    $this->properties['description'] = true;
    $this->description = $description;
  }

  public function setPrice($price)
  {
    $this->properties['price'] = true;
    $this->price = $price;
  }

  public function propertiesAllFalse() {
    $this->properties['id'] = false;
    $this->properties['name'] = false;
    $this->properties['description'] = false;
    $this->properties['price'] = false;
  }

  public static function getTableName() {
    return "products";
  }
}