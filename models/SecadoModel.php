<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class SecadoModel extends mainModel{
    
    public function getSecados() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_secado;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}