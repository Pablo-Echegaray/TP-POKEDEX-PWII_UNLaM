<?php
include_once ("Configuracion.php");

$router = Configuracion::getRouter();

$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$action = isset($_GET["action"]) ? $_GET["action"] : "";

$router->route($controller, $action);

?>