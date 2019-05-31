<?php

namespace app\controllers;


use app\engine\Renderer;
use app\interfaces\IRenderer;
use app\model\Basket;
use app\model\Users;

class Controller implements IRenderer
{
  private $action;
  private $defaultAction = 'index';
  private $layout = 'main';
  private $useLayout = true;
  private $renderer;


  public function __construct(IRenderer $renderer)
  {
    $this->renderer = $renderer;
  }

  public function runAction($action = null) {
    $this->action = $action ?: $this->defaultAction;

    $method = "action" . ucfirst($this->action);
    if (method_exists($this, $method)) {
      $this->$method();
    } else {
      echo "404";
    }
  }

  public function render($template, $params = []) {
    if ($this->useLayout) {
      return $this->renderTemplate(
          "layouts/{$this->layout}",
          ['content' => $this->renderTemplate($template, $params),
              'menu' => $this->renderTemplate('menu', [
                  'count' => Basket::getCount(),
                  'auth' => Users::is_auth(),
                  'user' => Users::getUserName()])]
      );
    } else {
      return $this->renderTemplate($template, $params);
    }
  }

  public function renderTemplate($template, $params = []) {
    return $this->renderer->renderTemplate($template, $params);
  }
}