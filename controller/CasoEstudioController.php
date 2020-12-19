<?php

require_once $GLOBALS['ROOT'] . "/models/CasoEstudioModel.php";
require_once $GLOBALS['ROOT'] . "/controller/LocalidadesController.php";

class casoEstudioController extends CasoEstudioModel {
    
    
    public function save($data){
        $cem = new CasoEstudioModel();
        $rescem = $cem->saveCaso($data);
        $lc = new LocalidadesController();
        foreach ($data['localidades'] as $loc) {
            $lc->save($rescem[0]->id, $loc);
        }        
    }

    public function addCaso() {
        $idsmtr = $_POST['idsmtr'];
        $casoestudio = $_POST['casoestudio'];
        $localizacion = $_POST['localizacion'];
        $cem = new CasoEstudioModel();
        $dataC = [
            "nombre" => $casoestudio,
            "localizacion" => $localizacion
        ];
        $res = $cem->saveCaso($dataC);
        foreach ($idsmtr as $cod){
            $cem->saveCasoMuestra($res[0]->id, $cod);
        }
        return "Datos guardados";
    }

}
