<?php
session_start();
if (isset($_SESSION["usuario"])) {
    include_once ("header_user.php");
    include_once ("home_user.php");
} else {
    header("location: index.php");
    exit();
}

?>