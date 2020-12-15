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
                    <th scope="col">PH suelo</th>
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
        var cant = $('#tblocalidades tbody tr').length;
        if (cant > 0) {
            updateLocalidadMuestra();
            $("#localidadmuestra").change();
            $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').removeClass('disabled');
            $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').tab('show');
            $('#registrar-caso-estudio-tab a[href="#nav-muestras"]').addClass('disabled');
        }

    });
</script>
<script>
    function addLocalidadesTable(data) {
        var tb = $('#tblocalidades tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tblocalidades tbody tr').length + 1)
        });
        var colCiudad = $('<td>', {'text': data.ciudad});
        var colDescripcion = $('<td>', {'text': data.detalle});
        var colPHSuelo = $('<td>', {'text': data.phsuelo});
        var colAltitud = $('<td>', {'text': data.altitud});
        var btnMuestras = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="verMuestras(' + "'flocalidades" + contFTBL + "'" + ')"><i class="fa fa-eye fa-2" aria-hidden="true"></i> Ver</button>');
        var colMuestras = $('<td>').append(btnMuestras);
        var btnEdit = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="editarLocalidad(' + "'flocalidades" + contFTBL + "'" + ')"><i class="fa fa-pencil-square-o fa-2" aria-hidden="true"></i></button>');
        var btnDel = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'flocalidades" + contFTBL + "'" + ',' + "'tblocalidades'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var colBTNS = $('<td>').append(btnEdit).append(btnDel);
        var filalocalidad = $('<tr>', {id: 'flocalidades' + contFTBL});
        filalocalidad.data("data", data);
        filalocalidad.append(colNum)
                .append(colCiudad)
                .append(colDescripcion)
                .append(colPHSuelo)
                .append(colAltitud)
                .append(colMuestras)
                .append(colBTNS)
                .appendTo(tb);
        contFTBL++;
    }
</script>

<script>

    function updateLocalidadTable(data, row) {

        $.each($('#' + row + " td"), function (index, item) {
            if (index === 0)
                $(item).text(data.ciudad);
            else if (index === 1)
                $(item).text(data.detalle);
            else if (index === 2)
                $(item).text(data.phsuelo);
            else if (index === 3)
                $(item).text(data.altitud);
        });
    }

</script>

<?php
require_once $GLOBALS['ROOT'] . '/views/modules/modal-localidad.php';
