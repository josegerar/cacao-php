<?php
if($getAjax == true){
    require_once "../models/viewsModel.php";
} else {
    require_once "./models/viewsModel.php";
}

class viewsController extends viewsModel
{

    public function get_template_controller()
    {
        return require_once "./views/plantilla.php";
    }
    public function get_view_controller($view)
    {
        if (isset($view)) {
            $response = viewsModel::get_view_model($view);
        } else {
            $response = viewsModel::get_view_error();
        }
        return require_once $response;
    }
}
