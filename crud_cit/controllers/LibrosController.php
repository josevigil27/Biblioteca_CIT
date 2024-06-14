<?php

namespace Controllers;

use Model\Autor;
use Model\Genero;
use Model\Libro;
use MVC\Router;

class LibrosController
{
    public static function index(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $libros = Libro::all();

        foreach($libros as $libro) {
            $libro->genero = Genero::find($libro->generoid);
        }

        foreach($libros as $libro) {
            $libro->autor = Autor::find($libro->autorid);
        }

        $resultado = $_GET['resultado'] ?? null;

        $router->render('admin/libros/index', [
            'titulo' => 'Libros',
            'resultado' => $resultado,
            'libros' => $libros
        ]);
    }

    public static function crear(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        $alertas = [];
        $libro = new Libro;

        $generos = Genero::all('ASC');
        $autores = Autor::all('ASC');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libro->sincronizar($_POST);
            $alertas = $libro->validar();

            if(empty($alertas)) {
                $resultado = $libro->guardar();

                if($resultado) {
                    header('Location: /admin/libros?resultado=1');
                }
            }
        }

        $router->render('admin/libros/crear', [
            'titulo' => 'Crear Libro',
            'alertas' => $alertas,
            'generos' => $generos,
            'autores' => $autores,
            'libro' => $libro
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
            header('Location: /admin/libros');
        }

        $libro = Libro::find($id);

        $generos = Genero::all('ASC');
        $autores = Autor::all('ASC');

        if(!$libro) {
            header('Location: /admin/libros');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libro->sincronizar($_POST);
            $alertas = $libro->validar();

            if(empty($alertas)) {
                $resultado = $libro->guardar();

                if($resultado) {
                    header('Location: /admin/libros?resultado=2');
                }
            }
        }

        $router->render('admin/libros/editar', [
            'titulo' => 'Editar Libro',
            'alertas' => $alertas,
            'generos' => $generos,
            'autores' => $autores,
            'libro' => $libro
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_auth()) {
                header('Location: /');
                return;
            }

            $id = $_POST['id'];
            $libro = Libro::find($id);

            if(!isset($libro) ) {
                header('Location: /admin/libros');
                return;
            }
            $resultado = $libro->eliminar();
            if($resultado) {
                header('Location: /admin/libros?resultado=3');
            }
        }
    }
}