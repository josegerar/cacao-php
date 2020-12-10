<?php

class viewsModel {
    
    public $dir = "";

    function __construct() {
        if ($GLOBALS['getAjax'] === true) {
            $this->dir = "..";
        } else {
            $this->dir = ".";
        }
    }

    protected function get_view_model($views) {
        $listaBlanca = [
            "home", "login", "caso_estudio", "casos_estudio"
        ];
        if (in_array($views, $listaBlanca)) {
            if (is_file($this->dir . "/views/contents/" . $views . "-view.php")) {
                $content = $this->dir . "/views/contents/" . $views . "-view.php";
            } else {
                $content = $this->get_view_error();
            }
        } else {
            $content = $this->get_view_error();
        }
        return $content;
    }

    function get_view_error() {
        return $this->dir . "/views/contents/page_404-view.php";
    }

}
