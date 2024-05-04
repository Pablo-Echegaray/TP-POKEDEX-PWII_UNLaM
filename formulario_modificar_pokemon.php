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
    echo $_POST['pokemon_id'];
    $pokemon = null;
    if(isset($_POST['pokemon_id']) && is_numeric($_POST['pokemon_id'])) {
        $pokemon_id = $_POST['pokemon_id'];
        $result = crearConexionBD(obtenerPokemon($pokemon_id));
        if(!is_string($result)) {
            $pokemon = mysqli_fetch_assoc($result);
            //echo $pokemon['nombre'];
        }
    }

?>
<main class="p-2 mt-2">
    <h3 class="text-center m-0">Modificar pokemon</h3>
    <form action="modificar_pokemon.php" method="post" enctype="multipart/form-data">
        <div class="form-flex">
            <div class="p-2">
                <label for="numero">Numero:</label>
                <input type='hidden' name='pokemon_id' value="<?php echo $pokemon['id']; ?>">
                <input type="number" name="numero" id="numero" class="form-control m-1" value="<?php echo $pokemon['numero_identificador']; ?>">
            </div>
            <div class="p-2">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control m-1" value="<?php echo $pokemon['nombre']; ?>">
            </div>
        </div>
        <div class="form-flex">
            <div class="p-2">
                <label for="pokemon">Imagen Actual del Pokemon:</label><br>
                <?php
                $rutaImagenPreseleccionada = $pokemon['imagen'];
                echo '<img src="' . $rutaImagenPreseleccionada . '" alt="imagen_preseleccionada" width="100">';
                ?>
            </div>
            <div class="p-2">
                <label for="pokemon">Cargar Nueva Imagen del Pokemon:</label>
                <input type="file" name="pokemon" id="pokemon" class="form-control m-1">
            </div>
            <div class="p-2">
                <label for="tipo">Tipo Actual del Pokemon:</label>
                <div class="form-flex">
                    <?php
                    $rutaTipoPreseleccionada = $pokemon['tipo'];
                    echo '<img src="' . $rutaTipoPreseleccionada . '" alt="imagen_preseleccionada" width="100">';
                    ?>
                </div>
            </div>
            <div class="p-2">
                <label for="tipo">Cargar Nuevo Tipo del Pokemon:</label>
                <div class="form-flex">
                    <input type="file" name="tipo" id="tipo" class="form-control m-1 d-block">
                </div>
            </div>
        </div>
        <div class="p-2">
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" class="form-control"><?php echo $pokemon['descripcion'] ?></textarea>
        </div>
        <button type="submit" class="boton btn text-light fw-bold w-100 mt-2">Modificar Pokemon</button>
    </form>
</main>

</body>
</html>