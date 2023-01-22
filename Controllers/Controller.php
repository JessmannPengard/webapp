<?php
class Controller
{
    protected function render($path, $parameters = [], $layout = "")
    {
        extract($parameters);
        ob_start();
        require_once(__DIR__ . "/../Views/" . $path . ".view.php");
        $content = ob_get_clean();
        require_once(__DIR__ . "/../views/" . $layout . ".layout.php");
    }
}