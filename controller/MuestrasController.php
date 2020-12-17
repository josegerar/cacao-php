<?php

require_once $GLOBALS['ROOT'] . "/models/MuestrasModel.php";
require_once $GLOBALS['ROOT'] . "/models/mainModel.php";
require_once $GLOBALS['ROOT'] . "/models/CacaoModel.php";
require_once $GLOBALS['ROOT'] . "/models/AnalisisSensorialModel.php";

class MuestrasController extends mainModel {

    public function save($locID, $data) {
        $mM = new MuestrasModel();
        $resmM = $mM->saveMuestra($locID, $data);
        $cM = new CacaoModel();
        foreach ($data['cacaotipos'] as $tipoC) {
            $cM->saveMuestraCacaoTipos($resmM[0]->id, $tipoC);
        }
        $asM = new AnalisisSensorialModel();
        foreach ($data['analisistipos'] as $analisisT) {
            $asM->saveAnalisisMuestra($resmM[0]->id, $analisisT);
        }
    }

}
