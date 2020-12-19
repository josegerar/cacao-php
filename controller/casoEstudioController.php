<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($getAjax) {
    require_once "../models/casoEstudioModel.php";
} else {
    require_once "./models/casoEstudioModel.php";
}

class casoEstudioController extends casoEstudioModel {

    public function addCaso() {
        $idsmtr = $_POST['idsmtr'];
        $casoestudio = $_POST['casoestudio'];
        $localizacion = $_POST['localizacion'];
        $cem = new casoEstudioModel();
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
