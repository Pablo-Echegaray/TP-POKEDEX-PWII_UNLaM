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
<?php include_once "header.php";?>

<form method="post">
    <label for="nombre_pokemon">Nombre del Pokémon:</label><br>
    <input type="text" id="nombre_pokemon" name="nombre_pokemon" value=""><br>
    <label for="img_pokemon">Imágen del Pokémon:</label><br>
    <input type="file" name="img_pokemon" id="img_pokemon">

    <!-- Otros campos del formulario para modificar -->

    <input type="submit" value="Guardar cambios">
</form>
<!--
<footer>
USAR INCLUDE_ONCE
</footer>
numero_identificador INT NOT NULL UNIQUE,
imagen VARCHAR(255) NOT NULL, (path img)
nombre VARCHAR(50) NOT NULL,
tipo VARCHAR(100) NOT NULL, (path img)
descripcion TEXT NOT NULL
<input type="text" id="nombre_pokemon" name="nombre_pokemon" value="php echo $pokemon['nombre_pokemon'];"><br>
-->
</body>
</html>