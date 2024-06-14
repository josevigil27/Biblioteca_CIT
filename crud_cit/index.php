<?php 

require_once __DIR__ . '/includes/app.php';

use Controllers\AuthController;
use Controllers\AutoresController;
use Controllers\DashboardController;
use Controllers\GenerosController;
use Controllers\LibrosController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/', [AuthController::class, 'login']);
$router->post('/', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Area de administracion
$router->get('/admin/index', [DashboardController::class, 'index']);

// Generos
$router->get('/admin/generos', [GenerosController::class, 'index']);
$router->get('/admin/generos/crear', [GenerosController::class, 'crear']);
$router->post('/admin/generos/crear', [GenerosController::class, 'crear']);
$router->get('/admin/generos/editar', [GenerosController::class, 'editar']);
$router->post('/admin/generos/editar', [GenerosController::class, 'editar']);
$router->post('/admin/generos/eliminar', [GenerosController::class, 'eliminar']);

// Autores
$router->get('/admin/autores', [AutoresController::class, 'index']);
$router->get('/admin/autores/crear', [AutoresController::class, 'crear']);
$router->post('/admin/autores/crear', [AutoresController::class, 'crear']);
$router->get('/admin/autores/editar', [AutoresController::class, 'editar']);
$router->post('/admin/autores/editar', [AutoresController::class, 'editar']);
$router->post('/admin/autores/eliminar', [AutoresController::class, 'eliminar']);

// Libros
$router->get('/admin/libros', [LibrosController::class, 'index']);
$router->get('/admin/libros/crear', [LibrosController::class, 'crear']);
$router->post('/admin/libros/crear', [LibrosController::class, 'crear']);
$router->get('/admin/libros/editar', [LibrosController::class, 'editar']);
$router->post('/admin/libros/editar', [LibrosController::class, 'editar']);
$router->post('/admin/libros/eliminar', [LibrosController::class, 'eliminar']);


$router->comprobarRutas();