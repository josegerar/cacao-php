<?php
require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class AnalisisSensorialModel extends mainModel{
    
    public function getTipoAnalisis() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_analisis_sensorial;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}