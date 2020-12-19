<?php
$getView = false;
$getAjax = true;
$ROOT = "..";

$OBJECT = $_REQUEST['object'];
$type = $_REQUEST['type'];
$data = $_REQUEST['data'];

if ($OBJECT == "caso-estudio"){
    require_once $GLOBALS['ROOT'] . "/controller/CasoEstudioController.php";
    $casoEstudioC = new CasoEstudioController();
    if($type == "save"){
        $casoEstudioC->save($data);
    }
    echo "1";
}