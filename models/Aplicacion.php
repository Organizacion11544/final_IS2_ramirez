<?php

namespace Model;

class Aplicacion extends ActiveRecord{
    public static $tabla = 'aplicaciones';
    public static $columnasDB = ['aplicacion_nombre','aplicacion_fecha_inicio','aplicacion_situacion'];
    public static $idTabla = 'aplicacion_id';

    public $aplicacion_id;
    public $aplicacion_nombre;
    public $aplicacion_fecha_inicio;
    public $aplicacion_situacion;

    public function __construct($args =[])
    {
        $this->aplicacion_id = $args['aplicacion_id'] ?? null;
        $this->aplicacion_nombre = $args['aplicacion_nombre'] ?? '';
        $this->aplicacion_fecha_inicio = $args['aplicacion_fecha_inicio'] ?? '';
        $this->aplicacion_situacion = $args['aplicacion_situacion'] ?? '1';
    }

}