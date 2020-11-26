<?php
require_once "./models/viewsModel.php";
class viewsController extends viewsModel
{

    public function get_template_controller()
    {
        return require_once "./views/plantilla.php";
    }
    public function get_view_controller()
    {
        if (isset($_GET['views'])) {
            $path = explode("/", $_GET['views']);
            $response = viewsModel::get_view_model($path[0]);
        } else {
            $response = "login";
        }
        return $response;
    }
}
