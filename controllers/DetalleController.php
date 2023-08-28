<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class DetalleController {
    public static function index(Router $router) {
        $detalles = Usuario::all();
    
        $router->render('dato/estadistica', [
            'detalles' => $detalles,
        ]);
    }
    

        //!Funcion Detalle
        public static function detalleEstadosAPI()
        {
    
            $sql = " SELECT usu_nombre,
            CASE
                WHEN usu_situacion = 1 THEN 'Activo'
                WHEN usu_situacion = 3 THEN 'Inactivo'
                WHEN usu_situacion = 2 THEN 'Pendiente'
            END AS estado
        FROM usuarios;
        
             ";
            

            try {
    
                $estados = Usuario::fetchArray($sql);
    
                echo json_encode($estados);
            } catch (Exception $e) {
                echo json_encode([
                    'detalle' => $e->getMessage(),
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
        }

        public static function index3(Router $router) {
            $detalles = Usuario::all();
        
            $router->render('dato/estadistica2', [
                'detalles' => $detalles,
            ]);
        }
        
    
            //!Funcion Detalle
            public static function detalleRolesAPI()
            {
        
                $sql = " SELECT usu_nombre,
                CASE
                    WHEN usu_situacion = 1 THEN 'Activo'
                    WHEN usu_situacion = 3 THEN 'Inactivo'
                    WHEN usu_situacion = 2 THEN 'Pendiente'
                END AS estado
            FROM usuarios;
            
                 ";
                
    
                try {
        
                    $estados = Usuario::fetchArray($sql);
        
                    echo json_encode($estados);
                } catch (Exception $e) {
                    echo json_encode([
                        'detalle' => $e->getMessage(),
                        'mensaje' => 'Ocurrió un error',
                        'codigo' => 0
                    ]);
                }
            }

}