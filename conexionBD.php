<?php
function crearConexionBD($query){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pokedex";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        $resultado = $result;
    }
    else{
        $resultado = "Error al ejecutar la consulta: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return $resultado;
}
?>
