<?php

namespace app\controllers;

use app\engine\Controller;

class MainController extends Controller
{

				public function index()
				{
					$this->view->render('Главная страница');
				}

				public function shorting()
				{
					if (!empty($_POST['url'])) {
						if ($this->model->checkUrl($_POST['url'])) {
							$this->model->createShortLink($_POST['url']);
							$code = $this->model->getUrl(['url' => $_POST['url']])[0]['short_code'];
							$this->view->messageUrl(
								"Success",
								"Good!",
								"http://".$_SERVER['HTTP_HOST']."/g/".$code
							);
						} else {
							$this->view->message("Error!", "This is url exists in database");
						}
					} else {
						$this->view->message("Error", "Fill in the field!");
					}
				}

				public function reflector()
				{
					if ($this->model->checkUrl($this->route['code']) == true) {
						$url = $this->model->getUrl(['short_code' => $this->route['code']])[0]['url'];
						if (stristr($url, "http", false) == false) {
							$url = "http://".$url;
						}
						$this->view->redirect($url);
					} else {
						$this->view->errorCode(404);
					}
					$this->view->render('Рефлектор');
				}

}

?>
