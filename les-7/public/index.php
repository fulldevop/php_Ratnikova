<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require_once ROOT_DIR . "vendor/autoload.php";
//include ROOT_DIR . "engine/Autoload.php";


use app\engine\Autoload;
use app\engine\Renderer;
use app\engine\TwigRenderer;
use app\engine\Request;
use \app\model\repositories\ProductRepository;

spl_autoload_register([new Autoload(), 'loadClass']);

/*
 Изменен порт MySQL
*/

//$repo = new ProductRepository();
//$product = $repo->getOne(1);
//$product->setPrice(60000);
//$repo->save($product);

try {
  $request = new Request();

  $controllerName = $request->getControllerName()?: 'product';
  $actionName = $request->getActionName();

  $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

  if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Renderer());
    $controller->runAction($actionName);

  }
} catch (\PDOException $e) {
  echo "Ошибка PDO!" . "<br>";
  echo $e->getMessage();
  var_dump($e->getTrace());
} catch (\Exception $e) {
  echo $e->getMessage() . "<br>";
  var_dump($e->getTrace());
}

