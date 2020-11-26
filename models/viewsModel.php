<?php
class viewsModel
{

    protected function get_view_model($views)
    {
        $listaBlanca = [
            "home", "login"
        ];
        if (in_array($views, $listaBlanca)) {
            if (is_file("./views/contents/" . $views . "-view.php")) {
                $content = "./views/contents/" . $views . "-view.php";
            } else {
                $content = "login";
            }
        } elseif ($views == "login") {
            $content = "login";
        } elseif ($views == "index") {
            $content = "login";
        } else {
            $content = "404";
        }
        return $content;
    }
}
