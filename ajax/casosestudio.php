<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$getAjax = true;
require_once "../config/config.php";
if (isset($_POST['idsmtr']) && isset($_POST['casoestudio']) && isset($_POST['localizacion'])) {
    require_once "../controller/casoEstudioController.php";
    $insCaso = new casoEstudioController();
    $result = $insCaso->addCaso();
    echo $result;
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.reload()</script>';
}
