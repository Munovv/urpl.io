<?php

namespace app\engine;

use app\engine\View;

abstract class Controller
{

      	public $route;
      	public $view;
      	public $acl;

      	public function __construct(array $route)
        {
      		$this->route = $route;
      		if (!$this->checkAcl()) {
      			View::errorCode(403);
      		}
      		$this->view = new View($route);
      		$this->model = $this->loadModel($route['controller']);
      	}

      	private function loadModel(string $name): Model
        {
      		$path = 'app\models\\'.ucfirst($name);
      		if (class_exists($path)) {
      			return new $path;
      		}
      	}

      	private function checkAcl(): bool
        {
      		$this->acl = require 'app/config/access.php';
      		if ($this->isAcl('all')) {
      			return true;
      		}
      		elseif (isset($_SESSION['user']['id']) and $this->isAcl('account')) {
      			return true;
      		}
      		elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
      			return true;
      		}
      		return false;
      	}

      	private function isAcl($key): int
        {
      		return in_array($this->route['action'], $this->acl[$key]);
      	}

}


 ?>
