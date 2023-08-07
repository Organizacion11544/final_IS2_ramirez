<?php

namespace Controllers;

use Exception;
use Model\Aplicacion;
use MVC\Router;

class AplicacionController{
    public static function index(Router $router){
        $aplicaciones = Aplicacion::all();
        // $aplicaciones2 = Aplicacion::all();
        // var_dump($aplicaciones);
        // exit;
        $router->render('aplicaciones/index', [
            'aplicaciones' => $aplicaciones,
            // 'aplicaciones2' => $aplicaciones2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $aplicacion = new Aplicacion($_POST);
            $resultado = $aplicacion->crear();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function modificarAPI(){
        try {
            $aplicacion = new Aplicacion($_POST);
            $resultado = $aplicacion->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function eliminarAPI(){
        try {
            $aplicacion_id = $_POST['aplicacion_id'];
            $aplicacion = Aplicacion::find($aplicacion_id);
            $aplicacion->aplicacion_situacion = 0;
            $resultado = $aplicacion->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function buscarAPI(){
        // $aplicaciones = Aplicacion::all();
        $aplicacion_nombre = $_GET['aplicacion_nombre'];
        $aplicacion_fecha_inicio = $_GET['aplicacion_fecha_inicio'];

        $sql = "SELECT * FROM aplicaciones where aplicacion_situacion = 1 ";
        if($aplicacion_nombre != '') {
            $sql.= " and aplicacion_nombre like '%$aplicacion_nombre%' ";
        }
        if($aplicacion_fecha_inicio != '') {
            $sql.= " and aplicacion_fecha_inicio = $aplicacion_fecha_inicio ";
        }
        try {
            
            $aplicaciones = Aplicacion::fetchArray($sql);
    
            echo json_encode($productos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}