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
<main class="p-4 mt-4 info-flex">
    <div>
        <img src="img/pokemones/bulbasaur.png" class="w-100 info-img">
    </div>
    <div class="d-flex flex-column justify-content-evenly align-items-center">
        <div>
            <img src="img/tipos/tipo_planta.png">
            <img src="img/tipos/tipo_veneno.png">
        </div>
        <h3>Bulbasaur</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.
            Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.
            Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue,
            euismod non, mi.
        </p>
        <p>
            Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl
            sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in,
            pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor.
        </p>
        <p>
            Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl
            sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in,
            pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor.
        </p>
    </div>

</main>
<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>


