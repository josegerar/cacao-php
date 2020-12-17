<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class RegistroFermentacionModel extends mainModel {
    
    public function saveRegistroFermentacion($muestraID, $data){
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.registro_fermentacion(
            id_muestra, cantidad_horas_registro, ph_testa, ph_cotiledon, temperatura)
            VALUES (:muestraID, :hora, :phtesta, :phcotiledon, :temperatura);");
        $sql->bindParam(":muestraID", $muestraID);
        $sql->bindParam(":hora", $data['hora']);
        $sql->bindParam(":phtesta", $data['phtesta']);
        $sql->bindParam(":phcotiledon", $data['phcotiledon']);
        $sql->bindParam(":temperatura", $data['temperatura']);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}
