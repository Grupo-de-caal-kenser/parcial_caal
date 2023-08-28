<?php

namespace Controllers;

use Exception;

use MVC\Router;
use Model\Usuario;

class LoginController {

    public static function index(Router $router) {
            if(!isset($_SESSION['auth_user'])){
                $router->render('login/index', []);
            }else{
                header('Location: /parcial_caal/inicio');
            }
        }

        public static function inicio(Router $router){
                $router->render('inicio/index', []);

        }

        public static function index2(Router $router){

            $router->render('registro/index', [
                'registro' => $registro,
            ]);
        
    }


    public static function loginAPI() {
        $catalogo = filter_var($_POST['usu_catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $password = filter_var($_POST['usu_password'], FILTER_DEFAULT);
        $usuarioRegistrado = Usuario::fetchFirst("SELECT * FROM usuarios WHERE usu_catalogo = $catalogo");

        try {
            if (is_array($usuarioRegistrado)) {
                $verificacion = password_verify($password, $usuarioRegistrado['usu_password']);
                $nombre = $usuarioRegistrado["usu_nombre"];
                $situacion = $usuarioRegistrado['usu_situacion'];
                
                if ($verificacion) {
               
                    echo json_encode([
                        'codigo' => 2,
                        'mensaje' => "verifique su contraseña",
                    ]);
                    
                } elseif ($situacion == 2) {
                    echo json_encode([
                        'codigo' => 3,
                        'mensaje' => 'Aun no esta autorizado'
                    ]);
                } elseif ($situacion == 3) {
                    echo json_encode([
                        'codigo' => 4,
                        'mensaje' => 'Cuenta inactiva'
                    ]);
                } elseif ($situacion == 1) {
                    session_start();
                    $_SESSION['auth_user'] = $catalogo;

                    echo json_encode([
                        'codigo' => 1,
                        'mensaje' => "Sesión iniciada correctamente. Bienvenido $nombre"
                    ]);
                }
            } else {
                echo json_encode([
                    'codigo' => 2,
                    'mensaje' => 'Usuario no encontrado'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'codigo' => 0,
                'mensaje' => 'Usuario no encontrado'
            ]);
        }
    }
    public static function guardarAPI(){
        try {
            $Datos = $_POST; 
            
            $nombre = $Datos['usu_nombre'];
            $catalogo = $Datos['usu_catalogo'];
            
            // Verificar si ya existe un usuario con el mismo nombre o catálogo
            $usuarioActivo = Usuario::fetchFirst("SELECT * FROM usuarios WHERE usu_nombre = '$nombre' OR usu_catalogo = $catalogo");
    
            if ($usuarioActivo) {
                if ($usuarioActivo['usu_nombre'] === $nombre) {
                    echo json_encode([
                        'mensaje' => 'Cuenta existente, ingrese otro nombre',
                        'codigo' => 2
                    ]);
                    return;
                } elseif ($usuarioActivo['usu_catalogo'] == $catalogo) {
                    echo json_encode([
                        'mensaje' => 'Catalogo duplicado, ingrese otro',
                        'codigo' => 3
                    ]);
                    return;
                }
            }
            
            $password = filter_var($Datos['usu_password'], FILTER_DEFAULT);
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $Datos['usu_password'] = $hashedPassword;
    
            $usuario = new Usuario($Datos);
            
            $resultado = $usuario->crear();
            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Solicutud enviada, espere activacion',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
            }
                
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
            ]);
        }
    }
    public static function logout(){
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location: /parcial_caal/');
    }
}