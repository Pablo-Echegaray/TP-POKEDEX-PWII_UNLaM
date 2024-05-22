<?php
session_start();
if (isset($_POST["user"]) && isset($_POST["pass"])) {
    $usuario = $_POST["user"];
    $pass = $_POST["pass"];

    $esValido = consultarBD($usuario, $pass);
    if ($esValido){
        $_SESSION["usuario"]=$usuario;
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

function consultarBD($usuario, $pass){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokedex";

    $conexion = mysqli_connect($servername,$username,$password,$database);
    if (!$conexion){
        die("Error al conectar con la base de datos ".mysqli_connect_error());
    }
    $sql = "SELECT * FROM administradores WHERE user = '".$usuario."' && pass = '".$pass."'";
    $resultado = mysqli_query($conexion,$sql);

    return mysqli_num_rows($resultado);
    mysqli_close($conn);
}
