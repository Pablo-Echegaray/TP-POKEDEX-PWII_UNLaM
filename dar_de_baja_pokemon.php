<?php
if (isset($_POST['pokemon_id']) && is_numeric($_POST['pokemon_id'])) {
    require_once ("conexionBD.php");

    $pokemon_id = $_POST['pokemon_id'];
    $conex = crearConex();

    $sql = "DELETE FROM pokemones WHERE id = $pokemon_id";
    $result = mysqli_query($conex, $sql);

    if (mysqli_affected_rows($conex) > 0) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error al eliminar el Pokémon";
        exit;
    }

} else {
    echo "Id de pokemon no válido: ";
    exit;
}

mysqli_close($conex);

?>