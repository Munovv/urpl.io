<?php

namespace app\engine;

use app\engine\Database;

abstract class Model
{

    	public $db;

    	public function __construct()
      {
    		$this->db = new Database;
    	}

}


 ?>
