<?php
require_once $GLOBALS['ROOT'] . "/models/SuelosModel.php";
require_once $GLOBALS['ROOT'] . "/models/BosquesModel.php";

$sModel = new SuelosModel();
$suelos = $sModel->getSuelos();

$bModel = new BosquesModel();
$bosques = $bModel->getBosques();
?>

<div class="modal fade" id="modalnuevalocalidad" tabindex="-1" role="dialog" aria-labelledby="modalnuevalocalidadTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nueva localidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNuevaLocalidad" class="small needs-validation">
                    <div class="form-group row">
                        <label for="ciudadloc" class="col-sm-2 col-form-label">Zona plantacion:</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="ciudadloc" placeholder="Ingrese la ciudad donde se encuentra la plantacion">
                            <div class="invalid-feedback">
                                Zona plantacion requerida.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detalleloc" class="col-sm-2 col-form-label">Detalle zona:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="detalleloc" placeholder="Ingrese informacion adiccional de la localidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiposuelo" class="col-sm-2 col-form-label">Tipo de suelo:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tiposuelo">
                                <?php foreach ($suelos as $suelo) { ?>
                                    <option value="<?php echo $suelo->id; ?>"><?php echo $suelo->nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipobosque" class="col-sm-2 col-form-label">Tipo de bosque:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipobosque">
                                <?php foreach ($bosques as $bosque) { ?>
                                    <option value="<?php echo $bosque->id; ?>"><?php echo $bosque->nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="altitudloc" class="col-sm-2 col-form-label">Altitud(m):</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="altitudloc" placeholder="Ingrese la alttiud del terreno(msnm)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="temperaturamediaanualloc" class="col-sm-2 col-form-label">Temperatura(°C):</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="temperaturamediaanualloc" placeholder="Ingrese la temperatura media de la localidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precipitacionmediaanualloc" class="col-sm-2 col-form-label">Precipitacion media anual:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="precipitacionmediaanualloc" placeholder="Ingrese el valor de precipitacion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="humedadmediaanualloc" class="col-sm-2 col-form-label">Humedad media anual:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="humedadmediaanualloc" placeholder="Ingrese el valor de humedad del ambiente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phsueloloc" class="col-sm-2 col-form-label">PH del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phsueloloc" placeholder="Ingrese el valor del PH del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cicsueloloc" class="col-sm-2 col-form-label">CIC del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cicsueloloc" placeholder="Ingrese el valor del CIC del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mosueloloc" class="col-sm-2 col-form-label">MO del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="mosueloloc" placeholder="Ingrese el valor del MO del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="velocidadvientoloc" class="col-sm-2 col-form-label">Velocidad del viento:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="velocidadvientoloc" placeholder="Ingrese el valor de la velocidad media del viento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ubicacionloc" class="col-sm-2 col-form-label">Ubicacion:</label>
                        <div class="col-sm-10">
                            <div id="ubicacionloc" style="height: 500px; width: 100%;"></div>


                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnGuardarLocalidad" type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script>

    var ubicacionLocalidad;
    var map;
    var marker;
    var editLoc = false;
    var rowEditLoc;

    class Localizacion {
        constructor(callback) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.lat = position.coords.latitude;
                    this.lng = position.coords.longitude;
                    callback();
                }, (error) => {
                    console.log("Ocurrio un error al obtener tu ubicacion!!");
                });
            } else {
                console.log("Tu navegador no soporta geolocalizacion!!");
            }
        }
    }
    function initMap() {
        const ubicacion = new Localizacion(() => {
            const posicion = {'lat': ubicacion.lat, 'lng': ubicacion.lng};
            const options = {'center': posicion, 'zoom': 15};
            ubicacionLocalidad = posicion;
            const texto = `<h1>Mi plantacion</h1><p>Esta es la ubicacion de mi plantacion de cacao</p>`;
            map = new google.maps.Map(document.getElementById('ubicacionloc'), options);
            marker = new google.maps.Marker({'position': posicion, 'title': 'Mi ubicacion', 'map': map});
            const informacion = new google.maps.InfoWindow({content: texto});
            marker.addListener('click', function () {
                informacion.open(map, marker);
            });
            google.maps.event.addListener(map, 'click', function (event) {
                marker.setPosition(event.latLng);
                ubicacionLocalidad = {'lat': event.latLng.lat(), 'lng': event.latLng.lng()};
            });
        });
    }

    initMap();
</script>

<script>
    $(document).on("click", "#btnGuardarLocalidad", function (event) {

        $('#formNuevaLocalidad').addClass('was-validated');
        var form = document.getElementById("formNuevaLocalidad");
        if (form.checkValidity() === true) {

            var loc;
            if (editLoc === true) {
                loc = $('#' + rowEditLoc).data("data");
            } else {
                loc = {};
            }
            loc['ciudad'] = $('#ciudadloc').val();
            loc['detalle'] = $('#detalleloc').val();
            loc['altitud'] = $('#altitudloc').val();
            if (loc['altitud'] === "")
                loc['altitud'] = 0;
            loc['temperatura'] = $('#temperaturamediaanualloc').val();
            if (loc['temperatura'] === "")
                loc['temperatura'] = 0;
            loc['precipitacion'] = $('#precipitacionmediaanualloc').val();
            if (loc['precipitacion'] === "")
                loc['precipitacion'] = 0;
            loc['humedad'] = $('#humedadmediaanualloc').val();
            if (loc['humedad'] === "")
                loc['humedad'] = 0;
            loc['phsuelo'] = $('#phsueloloc').val();
            if (loc['phsuelo'] === "")
                loc['phsuelo'] = 0;
            loc['cicsuelo'] = $('#cicsueloloc').val();
            if (loc['cicsuelo'] === "")
                loc['cicsuelo'] = 0;
            loc['mosuelo'] = $('#mosueloloc').val();
            if (loc['mosuelo'] === "")
                loc['mosuelo'] = 0;
            loc['velocidadviento'] = $('#velocidadvientoloc').val();
            if (loc['velocidadviento'] === "")
                loc['velocidadviento'] = 0;
            loc['tiposuelo'] = $("#tiposuelo option:selected").val();
            loc['tipobosque'] = $('#tipobosque option:selected').val();
            loc['ubicacion'] = ubicacionLocalidad;
            if (editLoc === true) {
                updateLocalidadTable(loc, rowEditLoc);
            } else {
                loc['muestras'] = [];
                caso_estudio_data.localidades.push(loc);
                addLocalidadesTable(loc);
            }
            $('#modalnuevalocalidad').modal('hide');
        }
    });
</script>

<script>
    function editarLocalidad(row) {
        var loc = $('#' + row).data("data");
        $('#ciudadloc').val(loc['ciudad']);
        $('#detalleloc').val(loc['detalle']);
        $('#altitudloc').val(loc['altitud']);
        $('#temperaturamediaanualloc').val(loc['temperatura']);
        $('#precipitacionmediaanualloc').val(loc['precipitacion']);
        $('#humedadmediaanualloc').val(loc['humedad']);
        $('#phsueloloc').val(loc['phsuelo']);
        $('#cicsueloloc').val(loc['cicsuelo']);
        $('#mosueloloc').val(loc['mosuelo']);
        $('#velocidadvientoloc').val(loc['velocidadviento']);
        $("#tiposuelo option[value=" + loc['tiposuelo'] + "]").prop("selected", true);
        $("#tipobosque option[value=" + loc['tipobosque'] + "]").prop("selected", true);
        marker.setPosition(loc['ubicacion']);
        map.setCenter(marker.getPosition());
        editLoc = true;
        rowEditLoc = row;
        $('#modalnuevalocalidad').modal('show');
    }
</script>

<script>
    $('#modalnuevalocalidad').on('hidden.bs.modal', function (e) {

        $("#formNuevaLocalidad")[0].reset();

        editLoc = false;
        rowEditLoc = "";
    });
</script>