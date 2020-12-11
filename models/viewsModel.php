<?php

class viewsModel {

    function __construct() {
        
    }

    protected function get_view_model($views) {
        $listaBlanca = [
            "home", "login", "caso_estudio", "casos_estudio"
        ];
        if (in_array($views, $listaBlanca)) {
            if (is_file($GLOBALS['ROOT'] . "/views/contents/" . $views . "-view.php")) {
                $content = $GLOBALS['ROOT'] . "/views/contents/" . $views . "-view.php";
                $GLOBALS['getView'] = true;
            } else {
                $content = $this->get_view_error();
            }
        } else {
            $content = $this->get_view_error();
        }
        return $content;
    }

    function get_view_error() {
        return $GLOBALS['ROOT'] . "/views/contents/page_404-view.php";
    }

}
