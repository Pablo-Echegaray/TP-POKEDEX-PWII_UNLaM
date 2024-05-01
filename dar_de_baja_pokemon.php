<?php
// Conexión a la base de datos (debes implementar tu propia lógica de conexión)
include_once("conexion.php");

// Verifica si se recibió un ID válido del Pokémon a dar de baja
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pokemon_id = $_GET['id'];

    // Actualiza el estado del Pokémon en la base de datos para indicar que está dado de baja
    $update_query = "UPDATE pokemon SET estado = 'inactivo' WHERE id_autoincremental = $pokemon_id";
    mysqli_query(conectarBD(), $update_query);

    // Redirecciona a la página principal después de dar de baja el Pokémon
    header("Location: index.php");
    exit;
} else {
    // Manejar el caso en el que no se proporcionó un ID válido
    echo "ID de Pokémon no válido.";
    exit;
}
?>
