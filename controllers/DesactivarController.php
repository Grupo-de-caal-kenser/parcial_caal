<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class DesactivarController {
    public static function index(Router $router){

        $router->render('desactivar/index', [
            'desactivar' => $desactivar,
        ]);
    }


    //!Funcion Buscar
    public static function buscarAPI()
    {

        $sql = "SELECT * FROM usuarios WHERE usu_situacion = 3 ";

        try {

            $usuarios = Usuario::fetchArray($sql);

            echo json_encode($usuarios);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    //!Funcion Activar
    public static function activarAPI(){
        try{
            $usu_id = $_POST['usu_id'];
            $usuario = Usuario::find($usu_id);
            $usuario->usu_situacion = 1;
            $resultado = $usuario->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Usuario Activado Exitosamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
            }
        }catch(Exception $e){
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
        ]);
        }
    }
    

    //!Funcion Eliminar
    public static function eliminarAPI(){
        try{
            $usu_id = $_POST['usu_id'];
            $usuario = Usuario::find($usu_id);
            $usuario->usu_situacion = 0;
            $resultado = $usuario->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Usuario Eliminado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
            }
        }catch(Exception $e){
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
        ]);
        }
    }
}