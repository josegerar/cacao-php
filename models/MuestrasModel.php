<?php
if ($getAjax) {
    require_once "../models/mainModel.php";
} else {
    require_once "./models/mainModel.php";
}
class muestrasModel extends mainModel
{
    
    public function saveMuestra($locID, $data){
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.muestra(
	id_localidad_plantacion, id_tipo_fermentador, id_tipo_secado, 
        id_calidad_fermentacion, cantidad_mazorcas, fecha_obtencion, tiempo_fermentacion, 
        tiempo_secado, humedad_post_secado, peso_promedio, ancho, espesor, longitud)
	VALUES (:locid, :tipofermentador, :tiposecado, :calidadfermentacion, :cantidadmazorcas, 
        :fecha, :tiempofermentacion, :tiemposecado, :humedadpostsecado, :pesopromedio, :ancho, 
        :espesor, :longitud) RETURNING *;");
        $sql->bindParam(":locid", $locID);
        $sql->bindParam(":tipofermentador", $data['tipofermentador']);
        $sql->bindParam(":tiposecado", $data['tiposecado']);
        $sql->bindParam(":calidadfermentacion", $data['calidadfermentacion']);
        $sql->bindParam(":cantidadmazorcas", $data['cantidadmazorcas']);
        $sql->bindParam(":fecha", $data['fecha']);
        $sql->bindParam(":tiempofermentacion", $data['tiempofermentacion']);
        $sql->bindParam(":tiemposecado", $data['tiemposecado']);
        $sql->bindParam(":humedadpostsecado", $data['humedadpostsecado']);
        $sql->bindParam(":pesopromedio", $data['pesopromedio']);
        $sql->bindParam(":ancho", $data['ancho']);
        $sql->bindParam(":espesor", $data['espesor']);
        $sql->bindParam(":longitud", $data['longitud']);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function getModels(){
        $query =  mainModel::getConnection()->prepare("select * from muestra");
        $query ->execute();
        $result = $query->fetchAll( PDO::FETCH_OBJ );
        return $result;
    }
}