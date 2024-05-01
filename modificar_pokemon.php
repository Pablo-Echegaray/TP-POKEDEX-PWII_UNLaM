<?php
// Conexión a la base de datos (debes implementar tu propia lógica de conexión)
include_once("conexion.php");

// Verifica si se recibió un ID válido del Pokémon a modificar
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pokemon_id = $_GET['id'];

    // Consulta la base de datos para obtener los detalles del Pokémon
    $query = "SELECT * FROM pokemon WHERE id_autoincremental = $pokemon_id";
    $result = mysqli_query(conectarBD(), $query);

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
    mysqli_query(conectarBD(), $update_query);

    // Redirecciona a la página principal después de la modificación
    header("Location: index.php");
    exit;
}

// Incluir el formulario de modificación con los detalles del Pokémon prellenados
include("formulario_modificar_pokemon.php");
?>
