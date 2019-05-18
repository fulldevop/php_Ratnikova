<?php
use app\model\Products;
use app\engine\Autoload;
use \app\model\Users;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include ROOT_DIR . "engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

/** @var Products $product */
/* Удаление
$product = Products::getOne(17);
$product->delete();
var_dump(Products::getAll());
*/
/* Добавление
$prod1 = new Products(null, "Good2", "Desc2", 300);
$prod1->insert();
*/
/* Изменение
$prod = Users::getOne(15);
$prod->setLogin('Larisa');
$prod->setPass('888');
$prod->save();
*/