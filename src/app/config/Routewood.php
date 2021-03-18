<?php

namespace app\config;

final class Routewood
{

    public static $list = [
      '' => [
        'action'      => 'index',
        'controller'  => 'main'
      ],
      'g/{code:\w+}' => [
        'action'     => 'reflector',
        'controller' => 'main'
      ],
      'shorting' => [
        'action'      => 'shorting',
        'controller'  => 'main'
      ],
      'login' => [
        'action' => 'login',
        'controller' => 'admin'
      ],
      'logout' => [
        'action' => 'logout',
        'controller' => 'admin'
      ],
      'dashboard' => [
        'action' => 'dashboard',
        'controller' => 'admin'
      ],
      'edit/{id:\d+}' => [
        'action' => 'edit',
        'controller' => 'admin'
      ],
      'delete/{id:\d+}' => [
        'action' => 'delete',
        'controller' => 'admin'
      ],
    ];

}

 ?>
