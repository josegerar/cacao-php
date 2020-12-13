<?php
require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class CalidadFermentacionModel extends mainModel{
    
    public function getCalidadades() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.calidad_fermentacion;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}