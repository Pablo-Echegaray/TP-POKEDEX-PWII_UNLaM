<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pokedex - Informacion sobre los pokemones">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <!-- ESTILO -->
    <link rel="stylesheet" href="css/style.css" as="style">
    <!-- FUENTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Jersey+15&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Pokedex</title>
</head>
<body>
<?php
    include_once "header.php";
    include_once "conexionBD.php";
    include_once "consultas_sql.php";

if(isset($_GET['id'])) {
    $pokemon_id = $_GET['id'];
    $query = obtenerPokemon($pokemon_id);
    $result = crearConexionBD($query);
    if(!is_string($result)){
        if(mysqli_num_rows($result) > 0) {
            $pokemon = mysqli_fetch_assoc($result);
?>

        <main class="p-4 mt-4 info-flex">
            <div> <!--imagen del pokemon-->
                <img src="<?php echo $pokemon['imagen']; ?>" class="w-100 info-img">
            </div>
            <div class="d-flex flex-column justify-content-evenly align-items-center">
                <div> <!--tipo-->
                    <img src="<?php echo $pokemon['tipo']; ?>">
                </div>
                <h3><?php echo $pokemon['numero_identificador']; ?> <?php echo $pokemon['nombre']; ?></h3> <!--número y nombre-->
                <p> <!--descripcion-->
                    <?php echo $pokemon['descripcion']; ?>
                </p>
            </div>

        </main>

        <?php
        }
    } else {
        echo 'No se encontró el Pokémon.';
    }
    mysqli_free_result($result);
}

?>

<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>