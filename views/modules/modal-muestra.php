<?php
require_once $GLOBALS['ROOT'] . "/models/FermentadorModel.php";
require_once $GLOBALS['ROOT'] . "/models/CalidadFermentacionModel.php";
require_once $GLOBALS['ROOT'] . "/models/SecadoModel.php";
require_once $GLOBALS['ROOT'] . "/models/CacaoModel.php";
require_once $GLOBALS['ROOT'] . "/models/AnalisisSensorialModel.php";

$fModel = new FermentadorModel();
$fermentadores = $fModel->getFermentadores();

$cfModel = new CalidadFermentacionModel();
$calidades = $cfModel->getCalidadades();

$sModel = new SecadoModel();
$secados = $sModel->getSecados();

$cModel = new CacaoModel();
$tiposCacao = $cModel->getTiposCacao();

$asModel = new AnalisisSensorialModel();
$tiposAnalisis = $asModel->getTipoAnalisis();
?>
<div class="modal fade" id="modalnuevamuestra" tabindex="-1" role="dialog" aria-labelledby="modalnuevamuestraTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nueva muestra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNuevaMuestra"  class="small needs-validation" >
                    <div class="form-group row">
                        <label for="tipoCacaotb" class="col-sm-2 col-form-label">Tipo de cacao:</label>
                        <div class="col-sm-10 position-relative" style="overflow-y: scroll; max-height: 160px;">
                            <table class="table table-hover table-sm" id="tipoCacaotb" >     
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipo de cacao</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaobtencion" class="col-sm-2 col-form-label">Fecha obtencion:</label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fechaobtencion" placeholder="Ingrese la fecha de obtencion de la muestra">
                            <div class="invalid-feedback">
                                Fecha de obtencion de muestra requerida.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidadmazorcas" class="col-sm-2 col-form-label">Cantidad mazorcas:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cantidadmazorcas" placeholder="Ingrese la cantidad de mazorcas de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipofermentador" class="col-sm-2 col-form-label">Tipo fermentador:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipofermentador">
                                <?php foreach ($fermentadores as $fermentador) { ?>
                                    <option value="<?php echo $fermentador->id; ?>"><?php echo $fermentador->nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempofermentacion" class="col-sm-2 col-form-label">Tiempo de fermentacion:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tiempofermentacion" placeholder="Ingrese el tiempo de fermentacion (dias)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="calidadfermentacion" class="col-sm-2 col-form-label">Calidad fermentacion:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="calidadfermentacion">
                                <?php foreach ($calidades as $calidad) { ?>
                                    <option value="<?php echo $calidad->id; ?>"><?php echo $calidad->nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tbregistrofermentacion" class="col-sm-2 col-form-label">Registro fermentacion: 

                        </label>
                        <div class="col-sm-10 position-relative" style="overflow-y: scroll; max-height: 160px;">
                            <table id="tbregistrofermentacion" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hora registro</th>
                                        <th scope="col">PH testa</th>
                                        <th scope="col">PH contiledon</th>
                                        <th scope="col">Temperatura</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiposecado" class="col-sm-2 col-form-label">Tipo de secado:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tiposecado">
                                <?php foreach ($secados as $secado) { ?>
                                    <option value="<?php echo $secado->id; ?>"><?php echo $secado->nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiemposecado" class="col-sm-2 col-form-label">Tiempo de secado:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tiemposecado" placeholder="Tiempo de secado (dias)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="humedadpostsecado" class="col-sm-2 col-form-label">Humedad post-secado:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="humedadpostsecado" placeholder="Ingrese el valor de la humedad despues del secado">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pesopromedio" class="col-sm-2 col-form-label">Peso pepa:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="pesopromedio" placeholder="Ingrese el promedo del peso de la pepa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="longitud" class="col-sm-2 col-form-label">Longitud pepa:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="longitud" placeholder="Ingrese la longitud media de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ancho" class="col-sm-2 col-form-label">Ancho pepa:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ancho" placeholder="Ingrese el ancho medio de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="espesor" class="col-sm-2 col-form-label">Espesor pepa:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="espesor" placeholder="Ingrese el espesor medio de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tbanalisissensorial" class="col-sm-2 col-form-label">Analisis sensorial:

                        </label>
                        <div class="col-sm-10 position-relative" style="overflow-y: scroll; max-height: 160px;">
                            <table id="tbanalisissensorial" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipo analisis</th>
                                        <th scope="col">Valor analisis</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnGuardarMuestra" type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
    //Script para generar
    var contFTC = 0;
    var contFRF = 0;
    var contFAS = 0;
    var tiposCacao = [];
    var tiposAnalisis = [];
    var editMs = false;
    var rowEditMs;

<?php foreach ($tiposCacao as $tiposC) { ?>
        tiposCacao.push({'value': '<?php echo $tiposC->id; ?>', 'text': '<?php echo $tiposC->nombre; ?>'});
    <?php
}
?>
<?php foreach ($tiposAnalisis as $tipoA) { ?>
        tiposAnalisis.push({'value': '<?php echo $tipoA->id; ?>', 'text': '<?php echo $tipoA->nombre; ?>'});
    <?php
}
?>

    // Aqui se crean los
    function agregarTipoCacao(data) {
        var tb = $('#tipoCacaotb tbody');
        var selectCacao = $('<select>', {
            class: 'form-control custom-select'
        });
        tiposCacao.forEach((item, index) => {
            var opt = $('<option>', {
                'value': item.value,
                'text': item.text
            });
            if (data == item.value) {
                opt.prop('selected', true);
            }
            selectCacao.append(opt);
        });
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tipoCacaotb tbody tr').length + 1)
        });
        var colText = $('<td>').append(selectCacao);
        var btnADD = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="agregarTipoCacao()"><i class="fa fa-plus fa-2" aria-hidden="true"></i></button>');
        var btnDEL = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'ftipoCacao" + contFTC + "'" + ',' + "'tipoCacaotb'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var divBTNS = $('<div class="form-group row justify-content-center">');
        divBTNS.append(btnADD).append(btnDEL);
        var colButtondel = $('<td>').append(divBTNS);
        $('<tr>', {id: 'ftipoCacao' + contFTC}).append(colNum)
                .append(colText)
                .append(colButtondel)
                .appendTo(tb);
        contFTC++;
    }
    //Se borra la fila creada
    function borrarFila(id_fila, tableName) {
        var cant = $('#' + tableName + ' tbody tr').length;
        if (cant > 1) {
            $('#' + id_fila).remove();
            $.each($('#' + tableName + ' tbody tr'), function (index, item) {
                $(item).children('th').text(index + 1);
            });
        }
    }
    agregarTipoCacao("");
</script>
<script>

    function agregarRegistroFermentacion(data) {
        var tb = $('#tbregistrofermentacion tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tbregistrofermentacion tbody tr').length + 1)
        });
        var colhoraregistro = $('<td><input value="' + data.hora + '" name="horaregistro" type="number" class="form-control" ></td>');
        var colphtesta = $('<td><input value="' + data.phtesta + '" name="phtesta" type="number" class="form-control" ></td>');
        var colphcotiledon = $('<td><input value="' + data.phcotiledon + '" name="phcotiledon" type="number" class="form-control" ></td>');
        var coltemperatura = $('<td><input value="' + data.temperatura + '" name="temperatura" type="number" class="form-control" ></td>');
        var btnAdd = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="agregarRegistroFermentacion({hora: \'\', phtesta: \'\', phcotiledon: \'\', temperatura: \'\'})"><i class="fa fa-plus fa-2" aria-hidden="true"></i></button>');
        var btnDel = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'fregistrofermentacion" + contFRF + "'" + ',' + "'tbregistrofermentacion'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var divBtns = $('<div class="form-group row justify-content-center"></div>').append(btnAdd).append(btnDel);
        var colBTNS = $('<td>').append(divBtns);
        $('<tr>', {id: 'fregistrofermentacion' + contFRF}).append(colNum)
                .append(colhoraregistro)
                .append(colphtesta)
                .append(colphcotiledon)
                .append(coltemperatura)
                .append(colBTNS)
                .appendTo(tb);
        contFRF++;
    }
    agregarRegistroFermentacion({hora: '', phtesta: '', phcotiledon: '', temperatura: ''});
</script>

<script>
    function agregarAnalisisSensorial(data) {
        var tb = $('#tbanalisissensorial tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tbanalisissensorial tbody tr').length + 1)
        });
        var selectAnalisis = $('<select>', {
            class: 'form-control'
        });
        tiposAnalisis.forEach((item, index) => {
            var opt = $('<option>', {
                'value': item.value,
                'text': item.text
            });

            if (data.tipo == item.value) {
                opt.prop('selected', true);
            }
            selectAnalisis.append(opt);
        });
        var colSelect = $('<td>').append(selectAnalisis);
        var colvalortipo = $('<td><input value="' + data.valoranalisis + '" type="number" class="form-control" ></td>');
        var btnAdd = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="agregarAnalisisSensorial({tipo: \'\', valoranalisis: \'\'})"><i class="fa fa-plus fa-2" aria-hidden="true"></i></button>');
        var btnDel = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="borrarFila(' + "'fanalisissensorial" + contFAS + "'" + ',' + "'tbanalisissensorial'" + ')"><i class="fa fa-trash fa-2" aria-hidden="true"></i></button>');
        var divBtns = $('<div class="form-group row justify-content-center"></div>').append(btnAdd).append(btnDel);
        var colBTNS = $('<td>').append(divBtns);
        $('<tr>', {id: 'fanalisissensorial' + contFAS}).append(colNum)
                .append(colSelect)
                .append(colvalortipo)
                .append(colBTNS)
                .appendTo(tb);
        contFAS++;
    }
    agregarAnalisisSensorial({tipo: '', valoranalisis: ''});
</script>

<script>
    $(document).on("click", "#btnGuardarMuestra", function (event) {

        $('#formNuevaMuestra').addClass('was-validated');
        var form = document.getElementById("formNuevaMuestra");

        if (form.checkValidity() === true) {

            var mst;

            if (editMs === true) {
                mst = $('#' + rowEditMs).data("data");
            } else {
                mst = {};
            }

            mst['cacaotipos'] = [];

            $.each($("#tipoCacaotb tbody tr"), function (index, item) {
                mst.cacaotipos.push($(item).find("select").val());
            });

            mst['fecha'] = $('#fechaobtencion').val();
            mst['cantidadmazorcas'] = $('#cantidadmazorcas').val();
            if (mst['cantidadmazorcas'] === "")
                mst['cantidadmazorcas'] = 0;
            mst['tipofermentador'] = $('#tipofermentador option:selected').val();
            mst['tipofermentadortxt'] = $('#tipofermentador option:selected').text();
            mst['tiempofermentacion'] = $('#tiempofermentacion').val();
            if (mst['tiempofermentacion'] === "")
                mst['tiempofermentacion'] = 0;
            mst['calidadfermentacion'] = $('#calidadfermentacion option:selected').val();
            mst['calidadfermentaciontxt'] = $('#calidadfermentacion option:selected').text();

            mst['fermentacionregistros'] = [];

            $.each($("#tbregistrofermentacion tbody tr"), function (index, item) {
                var ferreg = {};

                ferreg['hora'] = $($(item).find('td')[0]).find('input').val();
                if (ferreg['hora'] === "")
                    ferreg['hora'] = 0;
                ferreg['phtesta'] = $($(item).find('td')[1]).find('input').val();
                if (ferreg['phtesta'] === "")
                    ferreg['phtesta'] = 0;
                ferreg['phcotiledon'] = $($(item).find('td')[2]).find('input').val();
                if (ferreg['phcotiledon'] === "")
                    ferreg['phcotiledon'] = 0;
                ferreg['temperatura'] = $($(item).find('td')[3]).find('input').val();
                if (ferreg['temperatura'] === "")
                    ferreg['temperatura'] = 0;

                mst.fermentacionregistros.push(ferreg);
            });

            mst['tiposecado'] = $('#tiposecado option:selected').val();
            mst['tiposecadotxt'] = $('#tiposecado option:selected').text();
            mst['tiemposecado'] = $('#tiemposecado').val();
            if (mst['tiemposecado'] === "")
                mst['tiemposecado'] = 0;
            mst['humedadpostsecado'] = $('#humedadpostsecado').val();
            if (mst['humedadpostsecado'] === "")
                mst['humedadpostsecado'] = 0;
            mst['pesopromedio'] = $('#pesopromedio').val();
            if (mst['pesopromedio'] === "")
                mst['pesopromedio'] = 0;
            mst['longitud'] = $('#longitud').val();
            if (mst['longitud'] === "")
                mst['longitud'] = 0;
            mst['ancho'] = $('#ancho').val();
            if (mst['ancho'] === "")
                mst['ancho'] = 0;
            mst['espesor'] = $('#espesor').val();
            if (mst['espesor'] === "")
                mst['espesor'] = 0;
            mst['analisistipos'] = [];

            $.each($("#tbanalisissensorial tbody tr"), function (index, item) {
                var ferreg = {};

                ferreg['tipo'] = $($(item).find('td')[0]).find('select option:selected').val();
                ferreg['valoranalisis'] = $($(item).find('td')[1]).find('input').val();
                if (ferreg['valoranalisis'] === "")
                    ferreg['valoranalisis'] = 0;
                mst.analisistipos.push(ferreg);
            });

            if (editMs === true) {
                updateMuestrasTable(mst, rowEditMs);
            } else {
                var dataLoc = $("#localidadmuestra").find(":selected").data("data");
                dataLoc.muestras.push(mst);
                addMuestrasTable(mst);
            }

            $('#modalnuevamuestra').modal('hide');
        }
    });
</script>

<script>
    function editarMuestras(row) {

        $("#tipoCacaotb > tbody").html("");
        $("#tbregistrofermentacion > tbody").html("");
        $("#tbanalisissensorial > tbody").html("");

        var mst = $('#' + row).data("data");

        mst.cacaotipos.forEach(function (item, index) {
            agregarTipoCacao(item);
        });

        $('#fechaobtencion').val(mst['fecha']);
        $('#cantidadmazorcas').val(mst['cantidadmazorcas']);
        $("#tipofermentador option[value=" + mst['tipofermentador'] + "]").prop("selected", true);
        $('#tiempofermentacion').val(mst['tiempofermentacion']);
        $("#calidadfermentacion option[value=" + mst['calidadfermentacion'] + "]").prop("selected", true);

        mst.fermentacionregistros.forEach(function (item, index) {
            agregarRegistroFermentacion(item);
        });

        $("#tiposecado option[value=" + mst['tiposecado'] + "]").prop("selected", true);
        $('#tiemposecado').val(mst['tiemposecado']);
        $('#humedadpostsecado').val(mst['humedadpostsecado']);
        $('#pesopromedio').val(mst['pesopromedio']);
        $('#longitud').val(mst['longitud']);
        $('#ancho').val(mst['ancho']);
        $('#espesor').val(mst['espesor']);

        mst.analisistipos.forEach(function (item, index) {
            agregarAnalisisSensorial(item);
        });

        editMs = true;
        rowEditMs = row;

        $('#modalnuevamuestra').modal('show');
    }
</script>

<script>
    $('#modalnuevamuestra').on('hidden.bs.modal', function (e) {

        $("#formNuevaMuestra")[0].reset();

        editMs = false;
        rowEditMs = "";

        $("#tipoCacaotb > tbody").html("");
        $("#tbregistrofermentacion > tbody").html("");
        $("#tbanalisissensorial > tbody").html("");

        agregarTipoCacao("");
        agregarRegistroFermentacion({hora: '', phtesta: '', phcotiledon: '', temperatura: ''});
        agregarAnalisisSensorial({tipo: '', valoranalisis: ''});
    });
</script>
