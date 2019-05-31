<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require_once ROOT_DIR . "vendor/autoload.php";
include ROOT_DIR . "engine/Autoload.php";


use app\model\Products;
use app\engine\Autoload;
use \app\model\Users;
use app\engine\Renderer;
use app\engine\TwigRenderer;
use app\engine\Request;



/*
 Изменен порт MySQL
*/

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName()?: 'product';
$actionName = $request->getActionName();

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
  $controller = new $controllerClass(new Renderer());
  $controller->runAction($actionName);

}