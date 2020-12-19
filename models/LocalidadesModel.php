<?php

require_once $GLOBALS["ROOT"] . '/models/mainModel.php';

class LocalidadesModel extends mainModel {

    public function saveLocalidad($casoID, $data) {
        $ubicacion = $data['ubicacion'];
        $ubSQL = "ST_GeomFromText('POINT(" . $ubicacion['lng'] . " " . $ubicacion['lat'] . ")',4326)";
        $sql = mainModel::getConnection()->prepare("INSERT INTO public.locacion_plantacion(
            id_caso_estudio, id_tipo_suelo, id_tipo_bosque, altitud, precipitacion_anual_media, temperatura_anual_media, humedad_anual_media, ph_suelo, cic_suelo, mo_suelo, velocidad_media_viento, ubicacion, ciudad, descripcion)
            VALUES (:idcaso, :idtiposuelo, :idtipobosque, :altitud, :precipitacion, :temperatura, :humedad, :phsuelo, :cicsuelo, :mosuelo, :velocidad, "
            . $ubSQL ." , :ciudad, :descripcion) RETURNING *;");
        $sql->bindParam(":idcaso", $casoID);
        $sql->bindParam(":idtiposuelo", $data['tiposuelo']);
        $sql->bindParam(":idtipobosque", $data['tipobosque']);
        $sql->bindParam(":altitud", $data['altitud']);
        $sql->bindParam(":precipitacion", $data['precipitacion']);
        $sql->bindParam(":temperatura", $data['temperatura']);
        $sql->bindParam(":humedad", $data['humedad']);
        $sql->bindParam(":phsuelo", $data['phsuelo']);
        $sql->bindParam(":cicsuelo", $data['cicsuelo']);
        $sql->bindParam(":mosuelo", $data['mosuelo']);
        $sql->bindParam(":velocidad", $data['velocidadviento']);
        $sql->bindParam(":ciudad", $data['ciudad']);
        $sql->bindParam(":descripcion", $data['detalle']);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
