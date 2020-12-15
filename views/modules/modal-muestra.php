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
                <form id="formNuevaMuestra"  class="small">
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
                            <input type="date" class="form-control" id="fechaobtencion" placeholder="Ingrese la fecha de obtencion de la muestra">
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
                        <label for="pesopromedio" class="col-sm-2 col-form-label">Peso promedio:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="pesopromedio" placeholder="Ingrese el promedo del peso de la pepa">
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
    function agregarTipoCacao() {
        var tb = $('#tipoCacaotb tbody');
        var selectCacao = $('<select>', {
            class: 'form-control custom-select'
        });
        tiposCacao.forEach((item, index) => {
            var opt = $('<option>', {
                'value': item.value,
                'text': item.text
            });
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
    agregarTipoCacao();
</script>
<script>

    function agregarRegisroFermentacion() {
        var tb = $('#tbregistrofermentacion tbody');
        var colNum = $('<th>', {
            'scope': 'row',
            'text': ($('#tbregistrofermentacion tbody tr').length + 1)
        });
        var colhoraregistro = $('<td><input name="horaregistro" type="number" class="form-control" ></td>');
        var colphtesta = $('<td><input name="phtesta" type="number" class="form-control" ></td>');
        var colphcotiledon = $('<td><input name="phcotiledon" type="number" class="form-control" ></td>');
        var coltemperatura = $('<td><input name="temperatura" type="number" class="form-control" ></td>');
        var btnAdd = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="agregarRegisroFermentacion()"><i class="fa fa-plus fa-2" aria-hidden="true"></i></button>');
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
    agregarRegisroFermentacion();
</script>

<script>
    function agregarAnalisisSensorial() {
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
            selectAnalisis.append(opt);
        });
        var colSelect = $('<td>').append(selectAnalisis);
        var colvalortipo = $('<td><input type="number" class="form-control" ></td>');
        var btnAdd = $('<button type="button" class="btn btn-light btn-outline-secondary btn-sm" onclick="agregarAnalisisSensorial()"><i class="fa fa-plus fa-2" aria-hidden="true"></i></button>');
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
    agregarAnalisisSensorial();
</script>

<script>
    $(document).on("click", "#btnGuardarMuestra", function (event) {
        var mst = {};
        mst['cacaotipos'] = [];
        
        $.each($("#tipoCacaotb tbody tr"), function (index, item) {
            mst.cacaotipos.push($(item).find("select").val());
        });
        
        

    });
</script>
