<?php

namespace Controllers;

use Exception;
use Model\Tarea;
use MVC\Router;

class TareaController{
    public static function index(Router $router){
        $tareas = Tarea::all();
        // $tareas2 = Tarea::all();
        // var_dump($tareas);
        // exit;
        $router->render('tareas/index', [
            'tareas' => $tareas,
            // 'tareas2' => $tareas2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $tarea = new Tarea($_POST);
            $resultado = $tarea->crear();

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
            $tarea = new Tarea($_POST);
            $resultado = $tarea->actualizar();

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
            $tarea_id = $_POST['tarea_id'];
            $tarea = Tarea::find($tarea_id);
            $tarea->tarea_situacion = 0;
            $resultado = $tarea->actualizar();

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
        // $tareas = Tarea::all();
        $tarea_id_aplicacion = $_GET['tarea_id_aplicacion'];
        $tarea_descripcion = $_GET['tarea_descripcion'];
        $tarea_estado = $_GET['tarea_estado'];
        $tarea_fecha = $_GET['tarea_fecha'];

        $sql = "SELECT * FROM tareas where tarea_situacion = 1 ";
        if($tarea_descripcion != '') {
            $sql.= " and tarea_id_aplicacion like '%$tarea_id_aplicacion%' ";
        }
        if($tarea_descripcion != '') {
            $sql.= " and tarea_descripcion like '%$tarea_descripcion%' ";
        }
        if($tarea_estado != '') {
            $sql.= " and tarea_estado like '%$tarea_estado%' ";
        }
        if($tarea_fecha != '') {
            $sql.= " and tarea_fecha = $tarea_fecha ";
        }
        try {
            
            $tareas = Tarea::fetchArray($sql);
    
            echo json_encode($tareas);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

}