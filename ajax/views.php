<?php
$getView = false;
$getAjax = true;
$ROOT = "..";

require_once '../controller/viewsController.php';

//$data_encode = file_get_contents("php://input");
//$data = json_decode($data_encode);
$view = $_REQUEST["view"];
//$view = $data->view;

$controller = new viewsController();
$controller->get_view_controller($view);

