<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ProgramadorController;
use Controllers\AplicacionController;
use Controllers\TareaController;
use Controllers\AsignacionController;
use Controllers\ProgresoController;

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

$router->get('/tareas', [TareaController::class,'index'] );
$router->post('/API/tareas/guardar', [TareaController::class,'guardarAPI'] );
$router->post('/API/tareas/modificar', [TareaController::class,'modificarAPI'] );
$router->post('/API/tareas/eliminar', [TareaController::class,'eliminarAPI'] );
$router->get('/API/tareas/buscar', [TareaController::class,'buscarAPI'] );

$router->get('/asignaciones', [AsignacionController::class,'index'] );
$router->post('/API/asignaciones/guardar', [AsignacionController::class,'guardarAPI'] );
$router->post('/API/asignaciones/modificar', [AsignacionController::class,'modificarAPI'] );
$router->post('/API/asignaciones/eliminar', [AsignacionController::class,'eliminarAPI'] );
$router->get('/API/asignaciones/buscar', [AsignacionController::class,'buscarAPI'] );

$router->get('/progresos', [ProgresoController::class,'index'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
