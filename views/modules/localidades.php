<form id="formListaLocalidad" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;">
    <div class="form-group row justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevalocalidad">
            Nueva localidad
        </button>
    </div>
    <div class="form-group row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Altitud</th>
                    <th scope="col">Muestra</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Caso 1</td>
                    <td>Descripcion 1</td>
                    <td>Ubicacion 1</td>
                    <td>Altitud</td>
                    <td><input class="btn btn-light btn-outline-secondary" type="button" value="Muestras"></td>
                    <td>
                        <input class="btn btn-light btn-outline-secondary" type="button" value="Editar">
                        <input class="btn btn-light btn-outline-secondary" type="button" value="Eliminar">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnAtras1" class="btn btn-secondary btn-lg" type="button" value="<- Atras">
        <input id="btnSiguiente2" class="btn btn-secondary btn-lg" type="button" value="Siguiente ->">
    </div>

</form>

<script>
    document.getElementById("btnAtras1").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-caso-estudio"]').tab('show');
    });
    document.getElementById("btnSiguiente2").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').tab('show');
    });
</script>

<?php
require_once $GLOBALS['ROOT'] . '/views/modules/modal-localidad.php';
