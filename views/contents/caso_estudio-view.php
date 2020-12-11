<h1><p class="text-center">ESTUDIO DESCRIPTIVO DE LAS ALMENDRAS DE CACAO</p></h1>

<nav>
  <div class="nav nav-tabs justify-content-center" id="registrar-caso-estudio-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-caso-estudio" role="tab" aria-controls="nav-caso-estudio" aria-selected="true">Caso de estudio</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-localidad" role="tab" aria-controls="nav-localidad" aria-selected="false">Localidades</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-muestras" role="tab" aria-controls="nav-muestras" aria-selected="false">Muestras</a>
  </div>
</nav>
<div class="tab-content" id="registrar-caso-estudio-tabContent">
  <div class="tab-pane fade show active" id="nav-caso-estudio" role="tabpanel" aria-labelledby="nav-caso-estudio-tab">
      <?php require_once $GLOBALS['ROOT'] . '/views/modules/caso-estudio.php'; ?>
  </div>
  <div class="tab-pane fade" id="nav-localidad" role="tabpanel" aria-labelledby="nav-localidad-tab">
      <?php require_once $GLOBALS['ROOT'] . '/views/modules/localidades.php'; ?>
  </div>
  <div class="tab-pane fade" id="nav-muestras" role="tabpanel" aria-labelledby="nav-muestras-tab">
      <?php require_once $GLOBALS['ROOT'] . '/views/modules/muestras.php'; ?>
  </div>
</div>