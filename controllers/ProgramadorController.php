<?php

namespace Controllers;

use Exception;
use Model\Programador;
use MVC\Router;

class ProgramadorController{
    public static function index(Router $router){
        $programadores = Programador::all();
        // $programadores2 = Programador::all();
        // var_dump($programadores);
        // exit;
        $router->render('programadores/index', [
            'programadores' => $programadores,
            // 'programadores2' => $programadores2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $programador = new Programador($_POST);
            $resultado = $programador->crear();

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
            $programador = new Programador($_POST);
            $resultado = $programador->actualizar();

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
            $programador_id = $_POST['programador_id'];
            $programador = Programador::find($programador_id);
            $programador->programador_situacion = 0;
            $resultado = $programador->actualizar();

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
        // $programadores = Programador::all();
        $programador_grado = $_GET['programador_grado'];
        $programador_nombre = $_GET['programador_nombre'];
        $programador_apellido = $_GET['programador_apellido'];

        $sql = "SELECT * FROM programadores where programador_situacion = 1 ";
        if($programador_nombre != '') {
            $sql.= " and programador_grado like '%$programador_grado%' ";
        }
        if($programador_nombre != '') {
            $sql.= " and programador_nombre like '%$programador_nombre%' ";
        }
        if($programador_nombre != '') {
            $sql.= " and programador_apellido like '%$programador_apellido%' ";
        }
        try {
            
            $programadores = Programador::fetchArray($sql);
    
            echo json_encode($programadores);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}