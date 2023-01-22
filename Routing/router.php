<?php

class Router
{
    private $controller;
    private $method;
    private $route;

    public function __construct($route = "")
    {
        $this->route = $route;
        $this->matchRoute();
    }

    public function matchRoute()
    {
        $url = explode("/", $this->route);
        $this->controller = ($url[0] != "" ? $url[0] : "home") . "Controller";
        $this->method = isset($url[1]) ? $url[1] : "index";
        /*if ($this->controller == "homeController") {
        session_start();
        if (!isset($_SESSION["user_name"])) {
        header("Location: " . URL_PATH . "/login");
        //require_once(__DIR__ . "./../Controllers/loginController.php");
        exit;
        }
        }*/

        $route_controller = __DIR__ . "/../Controllers/" . $this->controller . ".php";
        if (file_exists($route_controller)) {
            require_once($route_controller);
        } else {
            echo "Error 404: page not found";
            die();
        }
    }

    public function run()
    {
        $controller = new $this->controller();
        $method = $this->method;
        if (method_exists(($controller), $method)) {
            $controller->$method();
        } else {
            $controller->index();
        }
    }
}