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
    <style>
        /* Aplicar estilos cuando el ancho de la pantalla sea de al menos 768px */
        @media (min-width: 768px) {
            .form-flex {
                display: flex; /* Cambiar a diseño en línea */
            }
            .form-flex > div {
                flex: 1; /* Hacer que cada div ocupe el mismo espacio */
                margin-right: 10px; /* Espacio entre los elementos */
            }
            .form-flex > div:last-child {
                margin-right: 0; /* No aplicar margen derecho al último div */
            }
        }
    </style>
    <!-- FUENTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Jersey+15&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Pokedex</title>
</head>
<body>
<?php include_once "header.php";?>
<main class="p-2 mt-2">
    <h3 class="text-center m-0">Agrega tu pokemon</h3>
    <form action="funciones.php" method="post" enctype="multipart/form-data">
        <div class="form-flex">
            <div class="p-2">
                <label for="numero">Numero:</label>
                <input type="number" name="numero" id="numero" class="form-control m-1">
            </div>
            <div class="p-2">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control m-1">
            </div>
        </div>
        <div class="p-2">
            <label for="pokemon">Imagen del Pokemon:</label>
            <input type="file" name="pokemon" id="pokemon" class="form-control m-1">
        </div>
        <div class="p-2">
            <label for="tipo1">Tipo/s del Pokemon:</label>
            <div class="form-flex">
                <input type="file" name="tipo1" id="tipo1" class="form-control form-control-sm m-1 d-block">
                <input type="file" name="tipo2" id="tipo2" class="form-control form-control-sm m-1 d-block">
            </div>
        </div>
        <button type="submit" class="btn text-light fw-bold w-100 mt-2">Agregar Pokemon</button>
    </form>
</main>
<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>


