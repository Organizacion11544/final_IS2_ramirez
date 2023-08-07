<?php

namespace Model;

class Programador extends ActiveRecord{
    public static $tabla = 'programadores';
    public static $columnasDB = ['programador_grado','programador_nombre','programador_apellido','programador_situacion'];
    public static $idTabla = 'programador_id';

    public $programador_id;
    public $programador_grado;
    public $programador_nombre;
    public $programador_apellido;
    public $programador_situacion;

    public function __construct($args =[])
    {
        $this->programador_id = $args['programador_id'] ?? null;
        $this->programador_nombre = $args['programador_grado'] ?? '';
        $this->programador_nombre = $args['programador_nombre'] ?? '';
        $this->programador_precio = $args['programador_apellido'] ?? '';
        $this->programador_situacion = $args['programador_situacion'] ?? '1';
    }

}