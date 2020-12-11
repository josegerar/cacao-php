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
                <form id="formNuevaLocalidad" >
                    <div class="form-group row">
                        <label for="ciudadloc" class="col-sm-2 col-form-label">Ciudad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ciudadloc" placeholder="Ingrese la ciudad donde se encuentra la plantacion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detalleloc" class="col-sm-2 col-form-label">Detalles:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="detalleloc" placeholder="Ingrese informacion adiccional de la localidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiposuelo" class="col-sm-2 col-form-label">Tipo de suelo:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tiposuelo">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipobosque" class="col-sm-2 col-form-label">Tipo de bosque:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipobosque">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="altitud" class="col-sm-2 col-form-label">Altitud(m):</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="altitud" placeholder="Ingrese la alttiud del terreno(msnm)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="temperaturamediaanual" class="col-sm-2 col-form-label">Temperatura(°C):</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="temperaturamediaanual" placeholder="Ingrese la temperatura media de la localidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precipitacionmediaanual" class="col-sm-2 col-form-label">Precipitacion media anual:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="precipitacionmediaanual" placeholder="Ingrese el valor de precipitacion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="humedadmediaanual" class="col-sm-2 col-form-label">Humedad media anual:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="humedadmediaanual" placeholder="Ingrese el valor de humedad del ambiente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phsuelo" class="col-sm-2 col-form-label">PH del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phsuelo" placeholder="Ingrese el valor del PH del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cicsuelo" class="col-sm-2 col-form-label">CIC del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cicsuelo" placeholder="Ingrese el valor del CIC del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mosuelo" class="col-sm-2 col-form-label">MO del suelo:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="mosuelo" placeholder="Ingrese el valor del MO del suelo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="velocidadviento" class="col-sm-2 col-form-label">Velocidad del viento:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="velocidadviento" placeholder="Ingrese el valor de la velocidad media del viento">
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
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
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
            const texto = `<h1>Mi plantacion</h1><p>Esta es la ubicacion de mi plantacion de cacao</p>`;
            const map = new google.maps.Map(document.getElementById('ubicacionloc'), options);
            const marker = new google.maps.Marker({'position': posicion, 'title': 'Mi ubicacion', 'map': map});
            const informacion = new google.maps.InfoWindow({content: texto});
            marker.addListener('click', function () {
                informacion.open(map, marker);
            });
            google.maps.event.addListener(map, 'click', function (event) {
                marker.setPosition(event.latLng);
            });
        });
    }

    initMap();
</script>