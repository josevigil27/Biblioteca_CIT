<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class DashboardController {

    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $router->render('admin/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }
}