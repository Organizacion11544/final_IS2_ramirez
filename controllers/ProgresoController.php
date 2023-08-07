<?php
// ProgresoController.php

namespace Controllers;

use MVC\Router;
use Model\Aplicacion;
use Model\Tarea;
use Model\Programador;
use Model\Asignacion;
use Exception;

class ProgresoController
{
    public static function index(Router $router)
    {
        
        $router->render('progresos/index', [
            'avanceAplicacion' => $avanceAplicacion
        ]);
        
        $avanceAplicacion = static::AvanceAplicacion();
    }

    public static function AvanceAplicacion()
    {
        $sql = "
        SELECT a.aplicacion_nombre, p.programador_grado, p.programador_nombre, p.programador_apellido, ap.asignacion_id,
        t.tarea_descripcion, t.tarea_estado, t.tarea_fecha
        FROM aplicaciones a
        JOIN asignacion_programadores ap ON a.aplicacion_id = ap.asignacion_id_aplicacion
        JOIN programadores p ON ap.asignacion_id_programador = p.programador_id
        JOIN tareas t ON t.tarea_id_aplicacion = a.aplicacion_id
        WHERE 1=1 AND t.tarea_situacion = 1;
    ";

    try {
        $avanceAplicacion = Tarea::fetchArray($sql);
        $tareasAplicaciones = [];

        // Creamos un arreglo para agrupar las tareas por aplicación
        foreach ($avanceAplicacion as $tarea) {
            $aplicacionNombre = $tarea['aplicacion_nombre'];
            if (!isset($tareasAplicaciones[$aplicacionNombre])) {
                $tareasAplicaciones[$aplicacionNombre] = ['tareas' => [], 'finalizadas' => 0, 'total' => 0];
            }
            $tareasAplicaciones[$aplicacionNombre]['tareas'][] = $tarea;
            $tareasAplicaciones[$aplicacionNombre]['total']++;
            if ($tarea['tarea_estado'] === 'FINALIZADA') {
                $tareasAplicaciones[$aplicacionNombre]['finalizadas']++;
            }
        }

        // Ahora generamos la tabla para cada aplicación y sus tareas
        foreach ($tareasAplicaciones as $aplicacionNombre => $infoTareas) {
            echo "<h2>$aplicacionNombre</h2>";
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered text-center">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>No.</th>';
            echo '<th>Programador</th>';
            echo '<th>Asignación ID</th>';
            echo '<th>Tarea Descripción</th>';
            echo '<th>Tarea Estado</th>';
            echo '<th>Tarea Fecha</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($infoTareas['tareas'] as $indice => $tarea) {
                echo '<tr>';
                echo '<td>' . ($indice + 1) . '</td>';
                echo '<td>' . $tarea['programador_grado'] . ' ' . $tarea['programador_nombre'] . ' ' . $tarea['programador_apellido'] . '</td>';
                echo '<td>' . $tarea['asignacion_id'] . '</td>';
                echo '<td>' . $tarea['tarea_descripcion'] . '</td>';
                echo '<td>' . $tarea['tarea_estado'] . '</td>';
                echo '<td>' . $tarea['tarea_fecha'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            $porcentajeAvance = ($infoTareas['finalizadas'] / $infoTareas['total']) * 100;
            echo '<p>Porcentaje de Avance: ' . number_format($porcentajeAvance, 2) . '%</p>';
            echo '</div>';
        }
    } catch (Exception $e) {
        // Manejo de excepciones
        return [];
    }
}

}