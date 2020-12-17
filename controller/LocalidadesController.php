<?php

require_once $GLOBALS['ROOT'] . "/models/LocalidadesModel.php";
require_once $GLOBALS['ROOT'] . "/controller/MuestrasController.php";

class LocalidadesController extends LocalidadesModel {

    public function save($casoID, $data) {
        $locM = new LocalidadesModel();
        $resLoc = $locM->saveLocalidad($casoID, $data);
        $mM = new MuestrasController();
        foreach ($data['muestras'] as $muestra) {
            $mM->save($resLoc[0]->id, $muestra);
        }
    }

}
