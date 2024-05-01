<?php

/** Conectarse a la BD
 * $conn = conectarBD();
 * $sql = "SELECT * FROM peliculas";//Aca iria el INSERT INTO
 * Se le pasa la conexion establecida y la consulta
 * $result = mysqli_query($conn, $sql);*
 */

function conectarBD() {
    /**********  DATOS DE CONEXION A LA BASE DE DATOS  *********/
    $servername = "localhost";//Donde esta alojado el servidor de base de datos
    $username = "root";//Nombre de usuario
    $password = "";
    $database = "pokedex";//Cual es la baes de datos

    /******  CREAMOS CONEXION  *******/
//Crea una conexion a la base de datos y la guarda en una variable
    $conn = mysqli_connect($servername, $username, $password, $database);

    /************ VERIFICAMOS LA CONEXION ************/
    if (!$conn){
        die("Error al conectar con la base de datos: ". mysqli_connect_error());
    }
    return $conn;
}
?>