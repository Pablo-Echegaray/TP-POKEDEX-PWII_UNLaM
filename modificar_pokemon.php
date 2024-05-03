<?php

include_once "conexionBD.php";
include_once "consultas_sql.php";
//echo "<h1>Aún en desarrollo, vuelva mas tarde!</>";

function validarPokemon(){
    if(isset($_POST['pokemon_id']) && is_numeric($_POST['pokemon_id'])){
        $pokemon_id = $_POST['pokemon_id'];
        $result = crearConexionBD(obtenerPokemon($pokemon_id));
        if(!is_string($result) && !is_bool($result)){
            if(mysqli_num_rows($result) == 1) {
                $pokemon = mysqli_fetch_assoc($result);
                //echo json_encode($pokemon);
                return $pokemon;
            }else{
                echo "No se encontró el Pokémon.";
                return false;
            }
        }else{
            echo "Consulta inválida.";
            return false;
        }
    }else{
        echo "ID de Pokémon no válido.";
        return false;
    }
}
function generar_pokemon(){
    $pokemonValido = validarPokemon();
    $imagenPokemon = actualizar_imagen_pokemon($pokemonValido['imagen'], 'pokemon', 'pokemones');
    $imagenTipo = actualizar_imagen_pokemon($pokemonValido['tipo'], 'tipo', 'tipos');
    if(!is_bool($pokemonValido)){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pokemon = array(
                "id" => $pokemonValido['id'],
                "numero" => $_POST['numero'],
                "nombre"   => $_POST['nombre'],
                "pokemon"  => $imagenPokemon,
                "tipo"  => $imagenTipo,
                "descripcion"  => $_POST['descripcion']
            );

        }else{
            $pokemon = "Error inesperado al validar los datos.";
        }
    }else{
        $pokemon = "Error inesperado al validar los datos. Falló la consulta.";
    }
    echo json_encode($pokemon);
    return$pokemon;
}

function actualizar_imagen_pokemon($actual_path_img, $name, $folder){
    // Verificar si se ha enviado un archivo
    if (isset($_FILES[$name]) && $_FILES[$name]['size'] > 0){
        $file_name = $_FILES[$name]['name'];
        $file_size = $_FILES[$name]['size'];
        $file_tmp = $_FILES[$name]['tmp_name'];
        $file_type = $_FILES[$name]['type'];

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
        $path_img = $actual_path_img;
    }
    echo "path img : ".$path_img . "<br>";
    return $path_img;
}

function actualizarPokemon(){
    $pokemon = generar_pokemon();
    if(!is_string($pokemon)){
       $result = crearConexionBD(updatePokemon($pokemon));
       if(is_bool($result)){
           if($result == true){
               echo "Pokemon actualizado correctamente.";
               header("Location: index.php");
               exit;
           }else{
               echo "Hubo un error al actualizar el pokemon.";
           }
       }else{
           echo "Error al actualizar el pokemon. La consulta no devolvió un booleano.";
       }
    }else{
        echo "Pokemon no actualizado. La consulta devolvío un string.";
    }
}

actualizarPokemon();
?>
