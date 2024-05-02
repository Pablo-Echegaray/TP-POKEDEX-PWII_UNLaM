<?php
/*
 * Funciones que faltan:
 * Verificar que el numero y/o nombre del pokemon no este en la BD. Esto en "validarNumero"
 * */
function validarNumero($numeroPokemon){
    if (isset($numeroPokemon) && $numeroPokemon>0){
        return $numeroPokemon;
    } else {
        die("Numero Incorrecto");
    }
}

function validarNombre($nombrePokemon){
    if (isset($nombrePokemon)){
        return $nombrePokemon;
    } else {
        die("Nombre Incorrecto");
    }
}

function validarDescripcion($descripcion){
    if (isset($descripcion)){
        return $descripcion;
    } else {
        die("Descripcion vacia");
    }
}

function validarImagen($imagen){
    if (isset($imagen)) {
        $name = $imagen['name'];
        $type = $imagen['type'];
        $size = $imagen['size'];
        $temp_name = $imagen['tmp_name'];

        $datosImg = array(
            "nombre" => $name,
            "type" => $type,
            "tam" => $size,
            "tmp_nombre" => $temp_name
        );
        return $datosImg;
    } else {
        die("No se han enviado archivos");
    }
}

function agregarPokemonBD($num,$nombre,$img_pokemon,$img_tipo,$descripcion){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokedex";
    $conexion = mysqli_connect($servername,$username,$password,$database);
    if (!$conexion){
        die("Error al conectar con la base de datos ".mysqli_connect_error());
    }
    $ruta_pokemon = 'img/pokemones/'.$img_pokemon;
    $ruta_tipo = 'img/tipos/'.$img_tipo;
    $agregar = "
        INSERT INTO pokemones
            (`numero_identificador`, `imagen`, `nombre`, `tipo_1`, `descripcion`) 
        VALUES
            ('$num', '" . $ruta_pokemon . "', '$nombre', '" . $ruta_tipo . "', '$descripcion')
        ";
    $resultado = mysqli_query($conexion,$agregar);
    if ($resultado){
        header("Location: home_user.php");
        exit();
        //mostrarPokemones($conexion);
    } else {
        die("No se agrego el pokemon");
    }
}

/*function mostrarPokemones($conexion){
    $sql = "SELECT * FROM pokemones";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr><th>Imagen</th><th>Tipo</th><th>Numero</th><th>Nombre</th></tr>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";

            echo "<td><img src='" . $row["imagen"] . "'></td>";
            echo "<td><img src='" . $row["tipo_1"] . "'></td>";

            echo "<td>". $row["numero_identificador"] ."</td>";
            echo "<td>". $row["nombre"] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados";
    }
    mysqli_close($conexion);
}*/

$numero = validarNumero($_POST["numero"]);
$nombre = validarNombre($_POST["nombre"]);
$pokemon = validarImagen($_FILES["pokemon"]);
$tipo = validarImagen($_FILES["tipo"]);
$descripcion = validarDescripcion($_POST["descripcion"]);
agregarPokemonBD($numero,$nombre,$pokemon["nombre"],$tipo["nombre"],$descripcion);
?>