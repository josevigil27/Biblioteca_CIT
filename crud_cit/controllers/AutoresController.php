<?php

namespace Controllers;

use Model\Autor;
use MVC\Router;

class AutoresController
{
    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $autores = Autor::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/autores/index', [
            'titulo' => 'Autores',
            'resultado' => $resultado,
            'autores' => $autores
        ]);
    }

    public static function crear(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];
        $autor = new Autor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $autor->sincronizar($_POST);
            $alertas = $autor->validar();

            if(empty($alertas)) {
                $resultado = $autor->guardar();

                if($resultado) {
                    header('Location: /admin/autores?resultado=1');
                }
            }
        }

        $router->render('admin/autores/crear', [
                'titulo' => 'Crear Autor',
            'alertas' => $alertas,
            'autor' => $autor,
            'redes' => json_decode($autor->redes)
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
            header('Location: /admin/autores');
        }

        $autor = Autor::find($id);

        if(!$autor) {
            header('Location: /admin/autores');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['redes'] = json_encode( $_POST['redes'], JSON_UNESCAPED_SLASHES );

            $autor->sincronizar($_POST);
            $alertas = $autor->validar();

            if(empty($alertas)) {
                $resultado = $autor->guardar();

                if($resultado) {
                    header('Location: /admin/autores?resultado=2');
                }
            }
        }

        $router->render('admin/autores/editar', [
            'titulo' => 'Editar Autor',
            'alertas' => $alertas,
            'autor' => $autor,
            'redes' => json_decode($autor->redes)
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_auth()) {
                header('Location: /');
                return;
            }

            $id = $_POST['id'];
            $autor = Autor::find($id);

            if(!isset($autor) ) {
                header('Location: /admin/autores');
                return;
            }
            $resultado = $autor->eliminar();
            if($resultado) {
                header('Location: /admin/autores?resultado=3');
            }
        }
    }
}