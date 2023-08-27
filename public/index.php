<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\DetalleController;
use Controllers\UsuarioController;
use Controllers\RolController;
use Controllers\PermisoController;


$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [LoginController::class,'index']);
$router->get('/logout', [LoginController::class,'logout']);
$router->post('/API/login', [LoginController::class,'loginAPI']);

$router->get('/usuarios/datatable', [UsuarioController::class,'datatable']);
$router->get('/API/usuarios/buscar', [UsuarioController::class,'buscarAPI']);
// $router->get('/usuarios/estadistica', [DetalleController::class,'estadistica']);
// $router->get('/API/usuarios/estadistica', [DetalleController::class,'detalleVentasAPI']);
$router->post('/API/usuarios/guardar', [UsuarioController::class,'guardarAPI'] );
$router->post('/API/usuarios/modificar', [UsuarioController::class,'modificarAPI'] );
$router->post('/API/usuarios/eliminar', [UsuarioController::class,'eliminarAPI'] );

$router->get('/roles/datatable', [RolController::class,'datatable']);
$router->post('/API/roles/guardar', [RolController::class,'guardarAPI'] );
// $router->get('/roles/estadistica2', [DetalleController::class,'estadistica2']);
// $router->get('/API/roles/estadistica2', [DetalleController::class,'detalleRolesAPI']);
$router->post('/API/roles/modificar', [RolController::class,'modificarAPI'] );
$router->post('/API/roles/eliminar', [RolController::class,'eliminarAPI'] );
$router->get('/API/roles/buscar', [RolController::class,'buscarAPI'] );

$router->get('/permisos/datatable', [PermisoController::class,'datatable']);
$router->post('/API/permisos/guardar', [PermisoController::class,'guardarAPI'] );
// $router->get('/permisos/estadistica2', [DetalleController::class,'estadistica2']);
// $router->get('/API/permisos/estadistica2', [DetalleController::class,'detallePermisosAPI']);
$router->post('/API/permisos/modificar', [PermisoController::class,'modificarAPI'] );
$router->post('/API/permisos/eliminar', [PermisoController::class,'eliminarAPI'] );
$router->get('/API/permisos/buscar', [PermisoController::class,'buscarAPI'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();