<?php
include_once ("Configuracion.php");

$router = Configuracion::getRouter();

$controller = $_GET["controller"] ?? "";
$action = $_GET["action"] ?? "";

$router->route($controller, $action);

?>