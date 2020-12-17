<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class AnalisisSensorialModel extends mainModel {

    public function getTipoAnalisis() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_analisis_sensorial;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function saveAnalisisMuestra($muestraID, $data) {
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.analisis_sensorial_muestra(
            id_muestra, id_tipo_analisis, valor)
            VALUES (:muestraID, :analisisID, :valor);");
        $sql->bindParam(":muestraID", $muestraID);
        $sql->bindParam(":analisisID", $data['tipo']);
        $sql->bindParam(":valor", $data['valoranalisis']);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
