<?php
if ($getAjax) {
    require_once "../models/mainModel.php";
} else {
    require_once "./models/mainModel.php";
}
class muestrasModel extends mainModel
{
    public function getModels(){
        $result =  mainModel::getConnection()->prepare("select * from muestra");
        $result ->execute();
        $result = $result->fetchAll( PDO::FETCH_OBJ );
        return $result;
    }
}