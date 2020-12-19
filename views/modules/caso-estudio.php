<form id="formCasoEstudio" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;" class="needs-validation" novalidate>
    <div class="form-group row">
        <label for="casoestudio" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="casoestudio" required placeholder="Ingrese el nombre o titulo de un caso de estudio">
            <div class="invalid-feedback">
                Nombre de caso de estudio requerido.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="fecharealizacion" class="col-sm-2 col-form-label">Fecha realización:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="fecharealizacion" required placeholder="Ingrese el nombre o titulo de un caso de estudio">
            <div class="invalid-feedback">
                Fecha de realizacion requerida.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="resumen" class="col-sm-2 col-form-label">Resumen:</label>
        <div class="col-sm-10 ">
            <textarea id="resumen" class="form-control" rows="3" placeholder="Ingrese resumen de caso estudio"></textarea>
        </div>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnSiguiente1" class="btn btn-secondary btn-lg" type="button" value="Siguiente ->">

    </div>

</form>

<script>
    
    var caso_estudio_data = {};
    
    document.getElementById("btnSiguiente1").addEventListener("click", function () {
        $('#formCasoEstudio').addClass('was-validated');
        var form = document.getElementById("formCasoEstudio");
        if (form.checkValidity() === true) {
            $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').removeClass('disabled');
            $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').tab('show');
            $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').addClass('disabled');
            caso_estudio_data['nombre'] = $('#casoestudio').val();
            caso_estudio_data['fecha'] = $('#fecharealizacion').val();
            caso_estudio_data['resumen'] = $('#resumen').val();
            if (!(caso_estudio_data.hasOwnProperty("localidades"))){
                caso_estudio_data['localidades'] = [];
            }
        }
    });

</script>