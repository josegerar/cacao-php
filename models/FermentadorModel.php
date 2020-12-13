<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class FermentadorModel extends mainModel{
    
    public function getFermentadores() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion, capacidad
            FROM public.tipo_fermentador;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}

