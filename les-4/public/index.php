<?php
use app\model\Products;
use app\engine\Autoload;
use \app\model\Users;

session_start();


include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include ROOT_DIR . "engine/Autoload.php";

/*
 Изменен порт MySQL
*/

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
  $controller = new $controllerClass();
  $controller->runAction($actionName);

}