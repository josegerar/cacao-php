<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class CacaoModel extends mainModel{
    
    public function getTiposCacao() {
        $query = mainModel::getConnection()->prepare("SELECT id, nombre, descripcion
            FROM public.tipo_cacao;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}