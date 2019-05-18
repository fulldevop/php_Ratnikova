<?php

namespace app\engine;

class Autoload
{
  private $fileExtention = ".php";

  public function loadClass($className)
  {
    $className = str_replace(['app\\', '\\'], ['', DS], $className);
    $file = ROOT_DIR . "{$className}";
    $file .= $this->fileExtention;
    var_dump($file);

    if (file_exists($file)) {
      include $file;
    }
  }
}