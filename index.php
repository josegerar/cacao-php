<?php

$getAjax = false;
$getView = false;
session_start();

require_once "./config/config.php";
require_once "./controller/viewsController.php";

$plantilla = new viewsController();
$plantilla->get_template_controller();

