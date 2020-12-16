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
        <table id="tbMuestras" class="table table-hover">
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
                
            </tbody>
        </table>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnAtras2" class="btn btn-secondary btn-lg" type="button" value="<- Atras">
        <input id="btnGuardarCaso" class="btn btn-secondary btn-lg" type="button" value="Guardar">
    </div>

</form>

<script>

    var contFTBM = 0;

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
                $("#localidadmuestra").change();
            }
        });

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

<script>
    function addMuestrasTable(data) {

        var tb = $('#tbMuestras tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tbMuestras tbody tr').length + 1)
        });

        var colFermentador = $('<td>', {'text': data.tipofermentadortxt});
        var colSecado = $('<td>', {'text': data.tiposecadotxt});
        var colCalidad = $('<td>', {'text': data.calidadfermentaciontxt});
        var colFecha = $('<td>', {'text': data.fecha});
        var colPesopepa = $('<td>', {'text': data.pesopromedio});

        var btnEdit = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="editarMuestras(' + "'fmuestras" + contFTBM + "'" + ')"><i class="fa fa-pencil-square-o fa-2" aria-hidden="true"></i></button>');
        var btnDel = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'fmuestras" + contFTBM + "'" + ',' + "'tbMuestras'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var colBTNS = $('<td>').append(btnEdit).append(btnDel);
        var filamuestras = $('<tr>', {id: 'fmuestras' + contFTBM});
        filamuestras.data("data", data);
        filamuestras.append(colNum)
                .append(colFermentador)
                .append(colSecado)
                .append(colCalidad)
                .append(colFecha)
                .append(colPesopepa)
                .append(colBTNS)
                .appendTo(tb);
        contFTBM++;
    }
</script>

<script>
    function updateMuestrasTable(data, row){
        
        $.each($('#' + row + " td"), function (index, item) {
            if (index === 0)
                $(item).text(data.tipofermentadortxt);
            else if (index === 1)
                $(item).text(data.tiposecadotxt);
            else if (index === 2)
                $(item).text(data.calidadfermentaciontxt);
            else if (index === 3)
                $(item).text(data.fecha);
            else if (index === 4)
                $(item).text(data.pesopromedio);
        });
        
    }
</script>

<?php
require_once $GLOBALS['ROOT'] . '/views/modules/modal-muestra.php';
