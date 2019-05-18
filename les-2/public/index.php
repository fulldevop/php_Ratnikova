<?php
use app\model\Products;
use app\engine\Db;
use app\engine\Autoload;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include ROOT_DIR . "engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product1 = new Products(new Db());
