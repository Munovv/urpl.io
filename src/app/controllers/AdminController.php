<?php

namespace app\controllers;

use app\engine\Controller;

class AdminController extends Controller
{

        public function __construct($route) {
          parent::__construct($route);
          $this->view->layout = 'admin';
        }

        public function login()
        {
          if (isset($_SESSION['admin'])) {
            $this->view->redirect('dashboard');
          }
          if (!empty($_POST)) {
            if (!$this->model->valData($_POST)) {
              $this->view->message("Error", $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('dashboard');
          } else {
            $this->view->message("Error", "Server Error");
          }
        }

        public function logout() {
          unset($_SESSION['admin']);
          $this->view->redirect('/');
        }

        public function dashboard()
        {
          $vars = [
            'urls' => $this->model->getAllUrl()
          ];
          $this->view->render('Dashboard', $vars);
        }

        public function edit()
        {
          if ($this->model->checkExists($this->route['id'])) {
            if (!empty($_POST)) {
              if ($this->model->validateUrl($_POST)) {
                $this->model->edit($this->route['id'], $_POST);
                $this->view->message("Success", "Url data has been changed!");
              } else {
                $this->view->message("Error", "Fill in the field!");
              }
            }
            $vars = [
              'url_data' => $this->model->getData($this->route['id'])[0]
            ];
            $this->view->render("Edit url #".$this->route['id'], $vars);
          } else {
            $this->view->errorCode(404);
          }
        }

        public function delete()
        {
          if ($this->model->checkExists($this->route['id'])) {
            $this->model->delete($this->route['id']);
          } else {
            $this->view->errorCode(404);
          }
        }


}


 ?>
