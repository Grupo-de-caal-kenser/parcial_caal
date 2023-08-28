<?php

namespace Controllers;

use Exception;
use Model\Permiso;
use Model\Usuario;
use Model\Rol;
use MVC\Router;

class PermisoController
{
    public static function datatable(Router $router){
        $usuarios = static::buscarUsuario();
        $roles = static::buscarRol();
        $permisos = Permiso::all();

        $router->render('permisos/datatable', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }
    public static function buscarUsuario(){
        $sql = "SELECT * FROM usuarios where usu_situacion = 1";
    
        try {
            $usuarios = Usuario::fetchArray($sql);
    
            return $usuarios;
        } catch (Exception $e) {

            return [];
            
        }
    }
    //!--------------------------
    public static function buscarRol(){
        $sql = "SELECT * FROM roles where rol_situacion = 1";
    
        try {
            $roles = Rol::fetchArray($sql);
            return $roles;

        } catch (Exception $e) {
            return [];
            
        }
    }

    public static function guardarAPI()
    {
        try {
            $permiso = new Permiso($_POST);
            $resultado = $permiso->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
   
        try {
            $permiso = new Permiso($_POST);
            $resultado = $permiso->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI()
    {
        try {
            $permiso_id = $_POST['permiso_id'];
            $permiso = Permiso::find($permiso_id);
            $permiso->permiso_situacion = 0;
            $resultado = $permiso->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    
    public static function buscarAPI()
    {
        $usu_id = $_GET['usu_id'];
        $rol_id = $_GET['rol_id'];
        $permiso_usuario = $_GET['permiso_usuario']; 
        $permiso_rol = $_GET['permiso_rol']; 

        $sql = "SELECT permisos.permiso_id, usuarios.usu_nombre AS permiso_usuario, usuarios.usu_situacion AS usu_situacion, usuarios.usu_id, roles.rol_nombre AS permiso_rol, roles.rol_id
        FROM permisos
        INNER JOIN usuarios ON permisos.permiso_id = usuarios.usu_id
        INNER JOIN roles ON permisos.permiso_rol = roles.rol_id

        WHERE permisos.permiso_situacion = 1;";
    
    if ($usu_id != '') {
        $sql .= " AND usuarios.usu_id = '$usu_id'";
    }
    
    if ($rol_id != '') {
        $sql .= " AND roles.rol_id = '$rol_id'";
    }
    if ($permiso_usuario != '') {
        $permiso_usuario = strtolower($permiso_usuario);
        $sql .= " AND LOWER(permiso_usuario) LIKE '%$permiso_usuario%' ";
    }
    if ($permiso_rol != '') {
        $permiso_rol = strtolower($permiso_rol);
        $sql .= " AND permiso_rol= '$permiso_rol' ";
    }

        try {

            $permisos = Permiso::fetchArray($sql);

            echo json_encode($permisos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function estadistica(Router $router){
        $router->render('permisos/estadistica', []);
    }

    public static function detalleEstadoUsuarioAPI(){

        $sql = "SELECT usu_estado AS estado, COUNT(*) AS cantidad
        FROM usuarios
        GROUP BY usu_estado;";

        try {
            
            $usuarios = Permiso::fetchArray($sql);
    
            echo json_encode($usuarios);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function estadistica2(Router $router){
        $router->render('permisos/estadistica2', []);
    }

    public static function detalleUsuarioRolAPI(){

        $sql = "SELECT r.rol_nombre AS rol, COUNT(p.permiso_id) AS cantidad_usuarios
        FROM roles r
        LEFT JOIN permisos p ON r.rol_id = p.permiso_rol
        GROUP BY r.rol_id, r.rol_nombre
        ORDER BY r.rol_nombre;";
                
        try {
            
            $usuarios = Permiso::fetchArray($sql);
    
            echo json_encode($usuarios);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}