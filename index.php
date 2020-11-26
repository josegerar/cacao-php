<?php
require_once "./config/config.php";
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title><?php echo COMPANY; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php
        $getAjax = false;
        session_start();
        require_once "./models/muestrasModel.php";
        $mModel = new muestrasModel();
        $muestras = $mModel->getModels();
        ?>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">INICIO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CASOS DE ESTUDIO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">REGISTRAR</a>
                            <a class="dropdown-item" href="#">VER</a>
                        </div>
                    </li>
                </ul>
                <a class="nav-link" href="#">INICIAR SESION</a>

            </div>
        </nav>

        <section>
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
        </section>
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
                console.log({idsmtr: chechs, casoestudio: casoestudio, localizacion: localizacion });
                $.ajax({
                    method: "POST",
                    url: "<?php echo SERVERURL; ?>ajax/casosestudio.php",
                    data: {idsmtr: chechs, casoestudio: casoestudio, localizacion: localizacion }
                }).done(function (msg) {
                    alert("Data Saved: " + msg);
                });

            });
        </script>

    </body>

</html>