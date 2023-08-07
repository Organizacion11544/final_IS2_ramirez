<?php

namespace Model;

class Tarea extends ActiveRecord{
    public static $tabla = 'tareas';
    public static $columnasDB = ['tarea_id_aplicacion','tarea_descripcion','tarea_estado','tarea_fecha','tarea_situacion'];
    public static $idTabla = 'tarea_id';

    public $tarea_id;
    public $tarea_id_aplicacion;
    public $tarea_descripcion;
    public $tarea_estado;
    public $tarea_fecha;
    public $tarea_situacion;

    public function __construct($args =[])
    {
        $this->tarea_id = $args['tarea_id'] ?? null;
        $this->tarea_id_aplicacion = $args['tarea_id_aplicacion'] ?? null;
        $this->tarea_descripcion = $args['tarea_descripcion'] ?? '';
        $this->tarea_estado = $args['tarea_estado'] ?? '';
        $this->tarea_fecha = $args['tarea_fecha'] ?? '';
        $this->tarea_situacion = $args['tarea_situacion'] ?? '1';
    }

}