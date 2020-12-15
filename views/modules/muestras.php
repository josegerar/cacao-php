<form id="formListaLocalidad" style="padding-left: 10%; padding-right: 10%; padding-top: 30px;">
    <div class="form-group row">
        <label for="localidadmuestra" class="col-sm-2 col-form-label">Localidad:</label>
        <div class="col-sm-10">
            <select class="form-control" id="localidadmuestra">
                <option>Localidad 1</option>
                <option>Localidad 2</option>
                <option>Localidad 3</option>
                <option>Localidad 4</option>
                <option>Localidad 5</option>
            </select>
        </div>
    </div>
    <div class="form-group row justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevamuestra">
            Nueva muestra
        </button>
    </div>
    <div class="form-group row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo fermentador</th>
                    <th scope="col">Tipo secado</th>
                    <th scope="col">Calidad fermentacion</th>
                    <th scope="col">Fecha Obtencion</th>
                    <th scope="col">Peso pepa</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fermentador 1</td>
                    <td>Secado 1</td>
                    <td>Calidad 1</td>
                    <td>Fecha 1</td>
                    <td>Peso pepa 1</td>
                    <td>
                        <input class="btn btn-light btn-outline-secondary" type="button" value="Editar">
                        <input class="btn btn-light btn-outline-secondary" type="button" value="Eliminar">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnAtras2" class="btn btn-secondary btn-lg" type="button" value="<- Atras">
        <input id="btnGuardarCaso" class="btn btn-secondary btn-lg" type="button" value="Guardar">
    </div>

</form>

<script>
    document.getElementById("btnAtras2").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').removeClass('disabled');
        $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').tab('show');
        $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').addClass('disabled');
    });
    document.getElementById("btnGuardarCaso").addEventListener("click", function () {

//Aqui se guardara la informacion


    });
</script>

<script>

    function updateTableMuestras(data) {

    }

    function verMuestras(row) {
        updateLocalidadMuestra();
        var rowData = $("#" + row).data("data");
        $("#localidadmuestra option").each(function () {

            if (rowData === $(this).data("data")) {
                $(this).prop("selected", true);
            }
        });

        $("#localidadmuestra").change();
        $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').removeClass('disabled');
        $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').tab('show');
        $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').addClass('disabled');
    }

</script>

<script>

    function updateLocalidadMuestra() {

        $('#localidadmuestra option').remove();

        $.each($('#tblocalidades tbody tr'), function (index, item) {

            var data = $(item).data("data");

            var opt = $('<option>', {
                'value': (index + 1),
                'text': (index + 1) + ' - ' + data.ciudad
            });

            opt.data("data", data);

            $('#localidadmuestra').append(opt);
        });
    }

    $("#localidadmuestra").change(function (event) {

        var data = $(this).find(":selected").data("data");

        updateTableMuestras(data.muestras);

    });

</script>

<?php
require_once $GLOBALS['ROOT'] . '/views/modules/modal-muestra.php';
