<?php
require_once "./models/muestrasModel.php";
$mModel = new muestrasModel();
$muestras = $mModel->getModels();
?>
<h1><p class="text-center">ESTUDIO DESCRIPTIVO DE LAS ALMENDRAS DE CACAO</p>
    <p class="text-center">VISTAS FÍSICA, QUÍMICA Y SENSORIAL</p></h1>
<form id="formDatos" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;">
    <div class="form-group row">
        <label for="casoestudio" class="col-sm-2 col-form-label">Caso de estudio</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="casoestudio" placeholder="Ingrese un caso de estudio">
        </div>
    </div>
    <div class="form-group row">
        <label for="localizacion" class="col-sm-2 col-form-label">Localización</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="localizacion" placeholder="Ingrese ubicacion">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Muestras</div>
        <div class="col-sm-10">
            <script>
                var data_ids = [];
            </script>
            <?php foreach ($muestras as $muestra) { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Check_<?php echo $muestra->id; ?>">
                    <label class="form-check-label" for="Check_<?php echo $muestra->id; ?>">
                        <?php echo $muestra->nombre; ?>
                        <script>
                            data_ids.push(<?php echo $muestra->id; ?>);
                        </script>
                    </label>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="form-group row">
        <button id="btnEnviar" type="submit" class="btn btn-primary btn-block">Guardar</button>
    </div>
</form>
<script>
    $("#formDatos").submit(function (event) {
        event.preventDefault();
        var chechs = [];
        data_ids.forEach((item, index) => {
            if ($('#Check_' + item).prop('checked')) {
                chechs.push(item);
            }
        });
        var casoestudio = $("#casoestudio").val();
        var localizacion = $("#localizacion").val();
        console.log({idsmtr: chechs, casoestudio: casoestudio, localizacion: localizacion});
        $.ajax({
            method: "POST",
            url: "<?php echo SERVERURL; ?>ajax/casosestudio.php",
            data: {idsmtr: chechs, casoestudio: casoestudio, localizacion: localizacion}
        }).done(function (msg) {
            alert("Data Saved: " + msg);
        });

    });
</script>