<?php
if ($getAjax) {
    require_once "../models/mainModel.php";
} else {
    require_once "./models/mainModel.php";
}
class muestrasModel extends mainModel
{
    public function getModels(){
        $query =  mainModel::getConnection()->prepare("select * from muestra");
        $query ->execute();
        $result = $query->fetchAll( PDO::FETCH_OBJ );
        return $result;
    }
}