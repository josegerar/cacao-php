<?php
require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class BosquesModel extends mainModel{
    
    public function getBosques() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_bosque;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}