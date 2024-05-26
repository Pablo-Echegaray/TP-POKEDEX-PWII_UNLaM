<?php
include_once ("Configuracion.php");

session_start();

$router = Configuracion::getRouter();

$controller = $_GET["controller"] ?? "";
$action = $_GET["action"] ?? "";

$router->route($controller, $action);