<form id="formCasoEstudio" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;">
    <div class="form-group row">
        <label for="casoestudio" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="casoestudio" placeholder="Ingrese el nombre o titulo de un caso de estudio">
        </div>
    </div>
    <div class="form-group row">
        <label for="resumen" class="col-sm-2 col-form-label">Resumen:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="resumen" placeholder="Ingrese resumen de caso estudio">
        </div>
    </div>
    <div class="form-group row justify-content-center">
        <input id="btnSiguiente1" class="btn btn-secondary btn-lg" type="button" value="Siguiente ->">
    </div>

</form>

<script>
    document.getElementById("btnSiguiente1").addEventListener("click", function () {
        $('#registrar-caso-estudio-tab a[href="#nav-localidad"]').tab('show');
    });
</script>