<?php

namespace Controllers;

use Exception;
use Model\Permiso;
use MVC\Router;

class PermisoController
{
    public static function datatable(Router $router){
        if(isset($_SESSION['auth_user'])){
        $router->render('permisos/datatable', []);
        }else{
            header('Location: /datatable_kenser/');
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
        $permiso_usuario = $_GET['permiso_usuario'] ?? '';
        $permiso_rol = $_GET['permiso_rol'] ?? '';

        $sql = "SELECT * FROM permisos WHERE permiso_situacion = 1 ";
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
}