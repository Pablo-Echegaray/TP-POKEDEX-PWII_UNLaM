<?php
// Conexión a la base de datos
include_once("conexionBD.php");
global $conn;

function actualizar_pokemon($conexion){
    // Verifica si se recibió un ID válido del Pokémon a modificar
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pokemon_id = $_GET['id'];

        // Consulta la base de datos para obtener los detalles del Pokémon
        $query = "SELECT * FROM pokemones WHERE id = $pokemon_id";
        $result = mysqli_query($conexion, $query);

        if(mysqli_num_rows($result) == 1) {
            $pokemon = mysqli_fetch_assoc($result);
        } else {
            // Manejar el caso en el que no se encuentre el Pokémon con el ID dado
            echo "No se encontró el Pokémon.";
            exit;
        }
    } else {
        // Manejar el caso en el que no se proporcionó un ID válido
        echo "ID de Pokémon no válido.";
        exit;
    }

// Procesamiento del formulario de modificación
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibe los datos del formulario
        $nombre_pokemon = $_POST['nombre_pokemon'];
        // Aquí puedes recibir y procesar otros campos del formulario

        // Actualiza los detalles del Pokémon en la base de datos
        $update_query = "UPDATE pokemon SET nombre_pokemon = '$nombre_pokemon' WHERE id_autoincremental = $pokemon_id";
        mysqli_query($conexion, $update_query);

        // Redirecciona a la página principal después de la modificación
        header("Location: index.php");
        exit;
    }
}

function actualizar_imagen_pokemon(){
    // Verificar si se ha enviado un archivo
    if (isset($_FILES['img_pokemon']) && $_FILES['img_pokemon']['size'] > 0){
        $file_name = $_FILES['img_pokemon']['name'];
        $file_size = $_FILES['img_pokemon']['size'];
        $file_tmp = $_FILES['img_pokemon']['tmp_name'];
        $file_type = $_FILES['img_pokemon']['type'];
        /*
        echo $file_name;
        echo $file_size;
        echo $file_tmp;
        echo $file_type;
        */

        // Carpeta donde se moverá el archivo
        $upload_folder = '.img/pokemones';

        // Mover el archivo a la carpeta especificada
        if (file_exists($upload_folder. "/" .$file_name)){
            echo $_FILES['archivo']['name'] . " ya existe";
        }
        else{
            move_uploaded_file($file_tmp,$upload_folder."/".$file_name);
            echo "El archivo " . $file_name ." se subio correctamente";
            // Redirigir automáticamente a la página de carga
            header("Location: instagramo.php");
            exit(); // Asegura que el script se detenga después de la redirección
        }
    }
    else{
        echo "Por favor seleccione un archivo";
    }

}

// Incluir el formulario de modificación con los detalles del Pokémon prellenados
include("formulario_modificar_pokemon.php");

/*
numero_identificador INT NOT NULL UNIQUE,
imagen VARCHAR(255) NOT NULL, (path img)
nombre VARCHAR(50) NOT NULL,
tipo VARCHAR(100) NOT NULL, (path img)
descripcion TEXT NOT NULL
  */
?>
