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
    
    public function saveMuestraCacaoTipos($muestraID, $tipoID){
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.tipo_cacao_muestra(
	id_muestra, id_tipo_cacao)
	VALUES (:muestraID, :tipoID);");
        $sql->bindParam(":muestraID", $muestraID);
        $sql->bindParam(":tipoID", $tipoID);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}