<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokedex";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

$sql = "SELECT * FROM administradores";
$result = mysqli_query($conn, $sql);//Se le pasa la conexion establecida y la consulta
comprobar si hay resultados
if (mysqli_num_rows($result) > 0){
    //Mostrar resultados en una table HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Usuario</th><th>Contraseña</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>". $row["id"] ."</td>";
        echo "<td>". $row["user"] ."</td>";
        echo "<td>". $row["pass"] ."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados";
}
mysqli_close($conn);
*/
function crearConexionBD($query){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pokedex";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa";
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
