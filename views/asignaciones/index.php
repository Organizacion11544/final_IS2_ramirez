<h1 class="text-center">Formulario de Asignaciones</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioAsignaciones">
        <input type="hidden" name="asignacion_id" id="asignacion_id">
    <div class="row mb-3">
    <div class="col">
                <label for="unidad">Aplicaciones</label>
                <select class="form-control" name="asignacion_id_aplicacion" id="asignacion_id_aplicacion" >
                            <option value="">Seleccione una aplicacion..</option>
                            <?php foreach ($aplicaciones as $aplicacion) : ?>
                                <option value="<?= $aplicacion['aplicacion_id'] ?>">
                                    <?= $aplicacion['aplicacion_nombre'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>            
    </div>
    <div class="row mb-3">
    <div class="col">
                <label for="unidad">Programadores</label>
                <select class="form-control" name="asignacion_id_programador" id="asignacion_id_programador" >
                            <option value="">Seleccione una asignacion..</option>
                            <?php foreach ($programadores as $programador) : ?>
                                <option value="<?= $programador['programador_id'] ?>">
                                    <?= $programador['programador_grado'] . ' ' . $programador['programador_nombre'] . ' ' . $programador['programador_apellido'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
            </div>
        </div>
        <div class="row mb-3">

        </div>
    <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioAsignaciones" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    
</form>
</div>


<div class="row justify-content-center" id="divTabla">
    <div class="col-lg-8">
        <h2>Listado de Asignaciones</h2>
        <table class="table table-bordered table-hover" id="tablaAsignaciones">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>APLICACION</th>
                    <th>PROGRAMADOR</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/asignaciones/index.js')  ?>"></script>