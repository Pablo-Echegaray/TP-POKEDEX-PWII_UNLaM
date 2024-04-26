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
<main class="p-4 mt-4">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-primary text-center">Imagen</th>
            <th scope="col" class="text-primary text-center">Tipo</th>
            <th scope="col" class="text-primary text-center">Numero</th>
            <th scope="col" class="text-primary text-center">Nombre</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row" class="text-center w-25">
                <a href="#">
                    <img src="img/pokemones/bulbasaur.png" class="imagen-pokemon">
                </a>
            </th>
            <td class="text-center">
                <img src="img/tipos/tipo_planta.png">
                <img src="img/tipos/tipo_veneno.png">
            </td>
            <td class="text-center">
                0001
            </td>
            <td class="text-center">
                <a href="#" class="text-black text-decoration-none fw-bold"> Bulbasaur </a>
            </td>
        </tr>
        <tr>
            <th scope="row" class="text-center w-25">
                <a href="#">
                    <img src="img/pokemones/ivysaur.png" class="imagen-pokemon">
                </a>
            </th>
            <td class="text-center">
                <img src="img/tipos/tipo_planta.png">
                <img src="img/tipos/tipo_veneno.png">

            </td>
            <td class="text-center">
                0002
            </td>
            <td class="text-center">
                <a href="#" class="text-black text-decoration-none fw-bold"> Ivysaur </a>
            </td>
        </tr>
        <tr>
            <th scope="row" class="text-center w-25">
                <a href="#">
                    <img src="img/pokemones/venusaur.png" class="imagen-pokemon">
                </a>
            </th>
            <td class="text-center">
                <img src="img/tipos/tipo_planta.png">
                <img src="img/tipos/tipo_veneno.png">

            </td>
            <td class="text-center">
                0003
            </td>
            <td class="text-center">
                <a href="#" class="text-black text-decoration-none fw-bold"> Venusaur </a>
            </td>
        </tr>
        </tbody>
    </table>
</main>
<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>

