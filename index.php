<?php
session_start();
require_once(__DIR__ . '/Config/config.php');
require_once(__DIR__ . '/Routing/router.php');
require_once(__DIR__ . '/Models/db.php');
require_once(__DIR__ . '/Models/orm.php');
require_once(__DIR__ . '/Models/user.php');
require_once(__DIR__ . '/Models/post.php');
require_once(__DIR__ . '/Controllers/Controller.php');
require_once(__DIR__ . '/Helpers/date.php');

$route = isset($_GET["route"]) ? $_GET["route"] : "";
$router = new Router($route);
$router->run();