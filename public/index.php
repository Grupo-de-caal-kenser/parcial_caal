<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\DetalleController;
use Controllers\DatoController;
use Controllers\ActivarController;
use Controllers\DesactivarController;
use Controllers\RolController;
use Controllers\PermisoController;
use Controllers\UsuarioController;


$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);
$router->get('/', [AppController::class,'index']);

$router->get('/', [LoginController::class,'index']);
$router->get('/inicio', [LoginController::class,'inicio']);
$router->get('/logout', [LoginController::class,'logout']);
$router->post('/API/login', [LoginController::class,'loginAPI']);

$router->get('/registro', [LoginController::class,'index2']);
$router->post('/API/registro/guardar', [LoginController::class,'guardarAPI']);

//!Rutas para Activar a los usuarios
$router->get('/activar', [ActivarController::class,'index']);
$router->get('/API/activar/buscar', [ActivarController::class,'buscarAPI']);
$router->post('/API/activar/eliminar', [ActivarController::class,'eliminarAPI']);
$router->post('/API/activar/activar', [ActivarController::class,'activarAPI']);

//!Rutas para Lista de usuarios
$router->get('/dato', [DatoController::class,'index']);
$router->get('/API/dato/buscar', [DatoController::class,'buscarAPI']);
$router->post('/API/dato/eliminar', [DatoController::class,'eliminarAPI']);
$router->post('/API/dato/modificar', [DatoController::class,'modificarAPI']);
$router->post('/API/dato/desactivar', [DatoController::class,'desactivarAPI']);


//!Rutas para Lista de usuarios desactivados
$router->get('/desactivar', [DesactivarController::class,'index']);
$router->get('/API/desactivar/buscar', [DesactivarController::class,'buscarAPI']);
$router->post('/API/desactivar/eliminar', [DesactivarController::class,'eliminarAPI']);
$router->post('/API/desactivar/activar', [DesactivarController::class,'activarAPI']);

//!Rutas de Reporte de Cantidad de usuarios activos e inactivos
$router->get('/dato/estadistica', [DetalleController::class,'index']);
$router->get('/API/dato/estadistica', [DetalleController::class,'detalleEstadosAPI']);

$router->get('/dato/estadistica2', [DetalleController::class,'index3']);
$router->get('/API/dato/estadistica2', [DetalleController::class,'detalleRolesAPI']);

$router->get('/roles/datatable', [RolController::class,'datatable']);
$router->post('/API/roles/guardar', [RolController::class,'guardarAPI'] );
$router->get('/roles/estadistica2', [DetalleController::class,'estadistica2']);
$router->get('/API/roles/estadistica2', [DetalleController::class,'detalleRolesAPI']);
$router->post('/API/roles/modificar', [RolController::class,'modificarAPI'] );
$router->post('/API/roles/eliminar', [RolController::class,'eliminarAPI'] );
$router->get('/API/roles/buscar', [RolController::class,'buscarAPI'] );

$router->get('/permisos/datatable', [PermisoController::class,'datatable']);
$router->post('/API/permisos/guardar', [PermisoController::class,'guardarAPI'] );
$router->get('/permisos/estadistica2', [PermisoController::class,'estadistica2']);
$router->get('/API/permisos/estadistica', [PermisoController::class,'detalleEstadoUsuarioAPI']);
$router->get('/permisos/estadistica', [PermisoController::class,'estadistica']);
$router->get('/API/permisos/estadistica2', [PermisoController::class,'detalleUsuarioRolAPI']);
$router->post('/API/permisos/modificar', [PermisoController::class,'modificarAPI'] );
$router->post('/API/permisos/eliminar', [PermisoController::class,'eliminarAPI'] );
$router->get('/API/permisos/buscar', [PermisoController::class,'buscarAPI'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();