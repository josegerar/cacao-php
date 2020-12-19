<?php

require_once $GLOBALS['ROOT'] . "/models/mainModel.php";

class CasoEstudioModel extends mainModel {

    public function saveCaso($data) {
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.caso_estudio(
            nombre, fecha_realizacion, resumen)
            VALUES (:nombre, :fecha, :resumen) RETURNING *;");
        $sql->bindParam(":nombre", $data['nombre']);
        $sql->bindParam(":fecha", $data['fecha']);
        $sql->bindParam(":resumen", $data['resumen']);
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
