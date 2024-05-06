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
        @media (min-width: 768px) { .mq-tip{ width: 20%!important;} }
    </style>
    <!-- FUENTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Jersey+15&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Pokedex</title>
</head>
<body>
<?php include_once "header.php";?>
<main class="p-4 mt-4">
    <form action="" method="get" class="d-flex flex-column align-items-center">
        <h2 class="centrar m-0 fs-4">Busca tu POKEMON!</h2>
        <div class="input-group">
            <input type="search" name="buscar" placeholder="Ingrese el nombre, tipo o número de pokemon" class="form-control w-75 p-3">
            <button type="submit" class="btn text-light fw-bold w-25">¿Quien es este pokemon?</button>
        </div>
    </form>
   <?php 
    include_once "busqueda.php";
    ?>

</main>
</body>
</html>
