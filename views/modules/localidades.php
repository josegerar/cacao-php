<form id="formListaLocalidad" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;">
    <div class="form-group row justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevalocalidad">
            Nueva localidad
        </button>
    </div>
    <div class="form-group row">
        <table id="tblocalidades" class="table table-hover">
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

            </tbody>
        </table>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnAtras1" class="btn btn-secondary btn-lg" type="button" value="<- Atras">
        <input id="btnSiguiente2" class="btn btn-secondary btn-lg" type="button" value="Siguiente ->">
    </div>

</form>

<script>

    var contFTBL = 0;

    document.getElementById("btnAtras1").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-caso-estudio"]').removeClass('disabled');
        $('#registrar-caso-estudio-tab a[href="#nav-caso-estudio"]').tab('show');
        $('#registrar-caso-estudio-tab a[href="#nav-caso-estudio"]').addClass('disabled');
    });
    document.getElementById("btnSiguiente2").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').tab('show');
    });
</script>
<script>
    function addLocalidadesTable(data, edit, row) {
        var tb = $('#tblocalidades tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tblocalidades tbody tr').length + 1)
        });
        var colCiudad = $('<td>', {'text': data.ciudad});
        var colDescripcion = $('<td>', {'text': data.detalle});
        var colUbicacion = $('<td>', {'text': data.ubicacion.lat + ',' + data.ubicacion.lng});
        var colAltitud = $('<td>', {'text': data.altitud});
        var colMuestras = $('<td><input class="btn btn-light btn-outline-secondary btn-sm" type="button" value="Muestras"></td>');
        var btnEdit = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="editarLocalidad(' + "'flocalidades" + contFTBL + "'" + ')"><i class="fa fa-pencil-square-o fa-2" aria-hidden="true"></i></button>');
        var btnDel = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'flocalidades" + contFTBL + "'" + ',' + "'tblocalidades'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var colBTNS = $('<td>').append(btnEdit).append(btnDel);
        var filalocalidad = $('<tr>', {id: 'flocalidades' + contFTBL});
        filalocalidad.data("data", data);
        filalocalidad.append(colNum)
                .append(colCiudad)
                .append(colDescripcion)
                .append(colUbicacion)
                .append(colAltitud)
                .append(colMuestras)
                .append(colBTNS)
                .appendTo(tb);
        contFTBL++;
    }
</script>

<script>
    function editarLocalidad() {

    }
</script>

<?php
require_once $GLOBALS['ROOT'] . '/views/modules/modal-localidad.php';
