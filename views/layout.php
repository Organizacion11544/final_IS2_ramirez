<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>Control Administrativo</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand">
                <img src="<?= asset('./images/cit.png') ?>" width="35px'" >
                Aplicaciones
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/final_IS2_ramirez/aplicaciones"><i class="bi bi-gear me-2"></i>Aplicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/final_IS2_ramirez/programadores"><i class="bi bi-gear me-2"></i>Programadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/final_IS2_ramirez/asignaciones"><i class="bi bi-gear me-2"></i>Asignaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/final_IS2_ramirez/tareas"><i class="bi bi-gear me-2"></i>Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/final_IS2_ramirez/progresos"><i class="bi bi-gear me-2"></i>Progreso</a>
                    </li>
                </ul> 
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <!-- Ruta relativa desde el archivo donde se incluye menu.php -->
                    <a href="/final_IS2_ramirez/" class="btn btn-danger"><i class="bi bi-arrow-bar-left"></i>Inicio</a>
                </div>

            
            </div>
        </div>
        
    </nav>
    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
        
        <?php echo $contenido;?>
    </div>
    <div class="footer " >
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                
                </p>
            </div>
        </div>
    </div>
</body>
</html>