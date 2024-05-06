<?php
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

function agregarImagenAlPoryecto($imagen, $folder){
    if (isset($imagen) && $imagen['tam'] > 0){
        $file_name = $imagen['nombre'];
        $file_size = $imagen['tam'];
        $file_tmp = $imagen['tmp_nombre'];
        $file_type = $imagen['type'];

        $upload_folder = './img/' . $folder;
        $path_img = $upload_folder."/".$file_name;

        if(move_uploaded_file($file_tmp,$path_img)){
            echo "El archivo " . $file_name ." se subió correctamente";
        }else{
            echo "El archivo " . $file_name ." no se pudo subir.";
        }
        //exit();

    }
    else{
        echo "Hubo un error al subir el archivo";
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
            (`numero_identificador`, `imagen`, `nombre`, `tipo`, `descripcion`) 
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

$numero = validarNumero($_POST["numero"]);
$nombre = validarNombre($_POST["nombre"]);
$pokemon = validarImagen($_FILES["pokemon"]);
$tipo = validarImagen($_FILES["tipo"]);
$descripcion = validarDescripcion($_POST["descripcion"]);
agregarImagenAlPoryecto($pokemon, "pokemones");
agregarImagenAlPoryecto($tipo, "tipos");
agregarPokemonBD($numero,$nombre,$pokemon["nombre"],$tipo["nombre"],$descripcion);
?>