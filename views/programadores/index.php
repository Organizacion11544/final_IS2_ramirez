<h1 class="text-center">Registro de Programadores</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioProgramador">
        <input type="hidden" name="programador_id" id="programador_id">
        <div class="row mb-3">
            <div class="col">
                <label for="programador_grado">Grado del programador</label>
                <input type="text" name="programador_grado" id="programador_grado" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="programador_nombre">Nombre del programador</label>
                <input type="text" name="programador_nombre" id="programador_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="programador_apellido">Apellido del programador</label>
                <input type="text" name="programador_apellido" id="programador_apellido" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioProgramador" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <h2>Listado de programadores</h2>
        <table class="table table-bordered table-hover" id="tablaProgramadores">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>GRADO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/programadores/index.js')  ?>"></script>