<?php
namespace Controllers;
use Exception;
use Model\Asignacion;
use MVC\Router;
class AsignacionController{
    public static function index(Router $router){
        $asignaciones = Asignacion::all();
        $aplicaciones = static::buscarAplicaciones();
        $programadores = static::buscarProgramadores();
        $asignaciones = Asignacion::all();
        $router->render('asignaciones/index', [
            'asignaciones' => $asignaciones,
            'aplicaciones' => $aplicaciones,
            'programadores' => $programadores,
        ]);
    }
    public static function guardarAPI(){
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->crear();
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
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->actualizar();

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
            $asignacion_id = $_POST['asignacion_id'];
            $asignacion = Asignacion::find($asignacion_id);
            $asignacion->asignacion_situacion = 0;
            $resultado = $asignacion->actualizar();
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
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function buscarAPI(){
        $asignacion_id_aplicacion = $_GET['asignacion_id_aplicacion'];
        $sql = "select * from asignacion_programadores where asignacion_situacion = 1";
        if($asignacion_id_aplicacion != '') {
            $sql.= " and asignacion_id_aplicacion like '%$asignacion_id_aplicacion%' ";
        }
        // $asignacion_id_aplicacion = $_GET['asignacion_id_aplicacion'];
        // $asignacion_id_programador = $_GET['asignacion_id_programador'];
        // $asignacion_situacion = $_GET['asignacion_situacion'];
        // $asignacion_id = $_GET['asignacion_id'];
        // $sql = "SELECT a.aplicacion_nombre, p.programador_grado, p.programador_nombre, p.programador_apellido, ap.asignacion_id
        // FROM aplicaciones a
        // JOIN asignacion_programadores ap ON a.aplicacion_id = ap.asignacion_id_aplicacion
        // JOIN programadores p ON ap.asignacion_id_programador = p.programador_id
        // WHERE 1=1";
        // if($asignacion_id_aplicacion != '') {
        //     $sql.= " and asignacion_id_aplicacion like '%$asignacion_id_aplicacion%' ";
        // }
        // if($asignacion_id_programador != '') {
        //     $sql.= " and asignacion_id_programador like '%$asignacion_id_programador%' ";
        // }
        // if($asignacion_id != '') {
        //     $sql.= " and asignacion_id like '%$asignacion_id%' ";
        // }  
        try {            
            $asignaciones = Asignacion::fetchArray($sql);    
            echo json_encode($asignaciones);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function buscarAplicaciones(){
        $sql = "SELECT * FROM aplicaciones where aplicacion_situacion = 1 ";
        try {
            $aplicaciones = Asignacion::fetchArray($sql);
            if ($aplicaciones){
                return $aplicaciones;
            }else {
                return 0;
            }
        } catch (Exception $e) {
     
        }        
    }
    public static function buscarProgramadores(){       
        $sql = "SELECT * FROM programadores where programador_situacion = 1 ";        
        try {            
            $programadores = Asignacion::fetchArray($sql);    
            if ($programadores){
                return $programadores;
            }else {
                return 0;
            }
        } catch (Exception $e) {     
        }
    }
}