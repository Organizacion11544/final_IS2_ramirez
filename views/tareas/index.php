<h1 class="text-center">Registro de Tareas</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioTarea">
        <input type="hidden" name="tarea_id" id="tarea_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="tarea_id_aplicacion">Codigo de Aplicación</label>
                    <input type="number"  name="tarea_id_aplicacion" id="tarea_id_aplicacion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_descripcion">Descripción de las tareas por realizar</label>
                    <input type="text" name="tarea_descripcion" id="tarea_descripcion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_estado">Estado de la tarea</label>
                    <select name="tarea_estado" id="tarea_estado" class="form-select">
                        <option value="FINALIZADA">FINALIZADA</option>
                        <option value="NO INICIADA">NO INICIADA</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tarea_fecha">Fecha de la realización de la tarea</label>
                    <input type="date"  name="tarea_fecha" id="tarea_fecha" class="form-control">
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioTarea" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <h2>Listado de Tareas</h2>
        <table class="table table-bordered table-hover" id="tablaTareas">
        <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>APLICACION</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ESTADO</th>
                            <th>FECHA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
        </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/tareas/index.js')  ?>"></script>