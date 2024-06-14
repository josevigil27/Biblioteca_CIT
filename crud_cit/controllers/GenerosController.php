<?php

namespace Controllers;

use Model\Genero;
use MVC\Router;

class GenerosController
{
    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $generos = Genero::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/generos/index', [
            'titulo' => 'Generos',
            'resultado' => $resultado,
            'generos' => $generos
        ]);
    }

    public static function crear(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];
        $genero = new Genero;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero->sincronizar($_POST);
            $alertas = $genero->validar();

            if(empty($alertas)) {
                $resultado = $genero->guardar();

                if($resultado) {
                    header('Location: /admin/generos?resultado=1');
                }
            }
        }

        $router->render('admin/generos/crear', [
            'titulo' => 'Crear Genero',
            'alertas' => $alertas,
            'genero' => $genero
        ]);
    }

    public static function editar(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];

        // Vaidar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/generos');
        }

        $genero = Genero::find($id);

        if(!$genero) {
            header('Location: /admin/generos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero->sincronizar($_POST);
            $alertas = $genero->validar();

            if(empty($alertas)) {
                $resultado = $genero->guardar();

                if($resultado) {
                    header('Location: /admin/generos?resultado=2');
                }
            }
        }

        $router->render('admin/generos/editar', [
            'titulo' => 'Editar Genero',
            'alertas' => $alertas,
            'genero' => $genero
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_auth()) {
                header('Location: /');
                return;
            }

            $id = $_POST['id'];
            $bahia = Genero::find($id);

            if(!isset($bahia) ) {
                header('Location: /admin/generos');
                return;
            }
            $resultado = $bahia->eliminar();
            if($resultado) {
                header('Location: /admin/generos?resultado=3');
            }
        }
    }
}