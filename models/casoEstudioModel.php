<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($getAjax) {
    require_once "../models/mainModel.php";
} else {
    require_once "./models/mainModel.php";
}

class casoEstudioModel extends mainModel {

    public function saveCaso($data) {
        $sql = mainModel::getConnection()->prepare(" INSERT INTO public.caso_estudio(nombre, localizacion) "
                . "VALUES(:nombre, :localizacion) RETURNING *;");
        $sql->bindParam(":nombre", $data['nombre']);
        $sql->bindParam(":localizacion", $data['localizacion']);
        $sql->execute();
        $sql = $sql->fetchAll( PDO::FETCH_OBJ );
        return $sql;
    }

    public function saveCasoMuestra($idcaso, $idmuestra){
        $sql = mainModel::getConnection()->prepare(" INSERT INTO public.muestra_caso(id_caso, id_muestra)"
                . "VALUES(:id_caso, :id_muestra);");
        $sql->bindParam(":id_caso", $idcaso);
        $sql->bindParam(":id_muestra", $idmuestra);
        $sql->execute();
        return $sql;
    }
}
