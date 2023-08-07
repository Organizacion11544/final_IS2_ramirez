<!DOCTYPE html>
<html>
<head>
    <style>
        .table-container {
            width: 80%;
            margin: 0 auto;
        }
        .app-name {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav>
        <!-- Contenido de la barra de navegación -->
    </nav>

    <!-- Contenido de las tablas -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php foreach ($avanceAplicacion as $aplicacionNombre => $infoTareas) : ?>
                    <h2 class="app-name"><?= $aplicacionNombre ?></h2>
                    <div class="table-responsive table-container">
                        <table class="table table-bordered text-center">
                            <!-- Estructura de la tabla -->
                        </table>
                        <p>Porcentaje de Avance: <?= number_format(($infoTareas['finalizadas'] / $infoTareas['total']) * 100, 2) ?>%</p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</body>
</html>


<script src="<?= asset('./build/js/shows/index.js')  ?>"></script>