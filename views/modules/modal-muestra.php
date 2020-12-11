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
                <form id="formNuevaMuestra" >

                    <div class="form-group row">
                        <label for="tipofermentador" class="col-sm-2 col-form-label">Tipo fermentador:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipofermentador">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiposecado" class="col-sm-2 col-form-label">Tipo de secado:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tiposecado">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="calidadfermentacion" class="col-sm-2 col-form-label">Calidad fermentacion:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="calidadfermentacion">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipoCacaotb" class="col-sm-2 col-form-label">Tipo de cacao:</label>
                        <div class="col-sm-10" style="overflow-y: scroll; max-height: 160px;">
                            <table style="position: relative; left:0;" id="tipoCacaotb" >           
                                <tbody id="cuerpotipoCacao">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidadmazorcas" class="col-sm-2 col-form-label">Cantidad mazorcas:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cantidadmazorcas" placeholder="Ingrese la cantidad de mazorcas de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaobtencion" class="col-sm-2 col-form-label">Fecha obtencion:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="fechaobtencion" placeholder="Ingrese la fecha de obtencion de la muestra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempofermentacion" class="col-sm-2 col-form-label">Tiempo de fermentacion:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tiempofermentacion" placeholder="Ingrese el tiempo de fermentacion (dias)">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
    //Script para generar
    var cont1 = 0;
    // Aqui se crean los
    function agregarTipoCacao(nombre, data) {
        var tb = $('#tipoCacaotb tbody');
        var selectCacao = $('<select>', {
            id: 'autor' + cont1,
            class: 'form-control',
            name: 'autor',
            style: 'width: 413px; height: 40px;'
        });
        selectCacao.data("data", data);
        var colText = $('<td>').append(selectCacao);
        var div = $('<button type="button" class="btn btn-light btn-outline-secondary" onclick="agregarTipoCacao(\'\', null)">Agregar</i></a>');
        var div2 = $('<button type="button" class="btn btn-light btn-outline-secondary" onclick="borrarFila(' + "'ftipoCacao" + cont1 + "'" + ',' + "'tipoCacaotb'" + ')">Eliminar</a>');
        var colButtondel = $('<td>').append(div2);
        var colButtoadd = $('<td>').append(div);
        $('<tr>', {id: 'ftipoCacao' + cont1}).append(colText).append(colButtoadd).append(colButtondel).appendTo(tb);
        cont1++;
    }
    //Se borra la fila creada de autores
    function borrarFila(id_fila, tableName) {
        var table = document.getElementById(tableName);
        var cant = table.rows.length;
        if (cant > 1) {
            $('#' + id_fila).remove();
        }
    }
    agregarTipoCacao("", null);
</script>