<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ProgramadorController;
use Controllers\AplicacionController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/programadores', [ProgramadorController::class,'index'] );
$router->post('/API/programadores/guardar', [ProgramadorController::class,'guardarAPI'] );
$router->post('/API/programadores/modificar', [ProgramadorController::class,'modificarAPI'] );
$router->post('/API/programadores/eliminar', [ProgramadorController::class,'eliminarAPI'] );
$router->get('/API/programadores/buscar', [ProgramadorController::class,'buscarAPI'] );

$router->get('/aplicaciones', [AplicacionController::class,'index'] );
$router->post('/API/aplicaciones/guardar', [AplicacionController::class,'guardarAPI'] );
$router->post('/API/aplicaciones/modificar', [AplicacionController::class,'modificarAPI'] );
$router->post('/API/aplicaciones/eliminar', [AplicacionController::class,'eliminarAPI'] );
$router->get('/API/aplicaciones/buscar', [AplicacionController::class,'buscarAPI'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
