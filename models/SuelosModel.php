<?php
require_once $GLOBALS['ROOT'] . "/models/mainModel.php";

class SuelosModel extends mainModel {

    public function getSuelos() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_suelo;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
