<?php
// Main controller, all others expands this
class Controller
{
    // The function renders views joining the view with the layout and passing parameters from controller to view
    protected function render($path, $parameters = [], $layout = "")
    {
        extract($parameters);
        ob_start();
        require_once(__DIR__ . "/../Views/" . $path . ".view.php");
        $content = ob_get_clean();
        require_once(__DIR__ . "/../Views/" . $layout . ".layout.php");
    }
}