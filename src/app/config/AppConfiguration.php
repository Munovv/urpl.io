<?php

namespace app\config;

final class AppConfiguration
{

      public static $db_config = [
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'kika_urpl_io_db',
        'charset'  => 'utf8'
      ];

      public static $admin = [
        'login' => 'admin',
        'password' => '1234'
      ];

}


 ?>
