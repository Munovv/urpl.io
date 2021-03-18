<?php

namespace app\engine;

class View
{

      	public $path;
      	public $route;
      	public $layout = 'main';

      	public function __construct(array $route)
        {
      		$this->route = $route;
      		$this->path = $route['controller'].'/'.$route['action'];
      	}

      	public function render(string $title, array $vars = []): void
        {
      		extract($vars);
      		$path = 'templates/'.$this->path.'.php';
      		if (file_exists($path)) {
      			ob_start();
      			require $path;
      			$content = ob_get_clean();
      			require 'templates/'.$this->layout.'_layout.php';
      		}
      	}

      	public function redirect(string $url = ''): void
        {
      		header('location: '.$url);
      		exit;
      	}

      	public static function errorCode(int $code): void
        {
      		http_response_code($code);
      		$path = 'templates/errors/'.$code.'.php';
      		if (file_exists($path)) {
      			require $path;
      		}
      		exit();
      	}

      	public function message(string $status, string $message): void
        {
      		exit(json_encode(['status' => $status, 'message' => $message]));
      	}

        public function messageUrl(string $status, string $message, string $url): void
        {
      		exit(json_encode(['status' => $status, 'message' => $message, 'url' => $url]));
      	}

      	public function location(string $url): void
        {
      		exit(json_encode(['url' => $url]));
      	}

}

 ?>
