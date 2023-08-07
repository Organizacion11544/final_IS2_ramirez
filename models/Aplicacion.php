<?php

namespace Model;

class Aplicacion extends ActiveRecord{
    public static $tabla = 'aplicaciones';
    public static $columnasDB = ['aplicacion_nombre','aplicacion_fecha_inicio','aplicacion_situacion'];
    public static $idTabla = 'producto_id';

    public $aplicacion_id;
    public $aplicacion_nombre;
    public $aplicacion_fecha_inicio;
    public $aplicacion_situacion;

    public function __construct($args =[])
    {
        $this->producto_id = $args['aplicacion_id'] ?? null;
        $this->producto_nombre = $args['aplicacion_nombre'] ?? '';
        $this->producto_precio = $args['aplicacion_fecha_inicio'] ?? '';
        $this->producto_situacion = $args['aplicacion_situacion'] ?? '1';
    }

}