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
        @media (max-width: 768px) {
            .mq{
                display: flex;
                flex-direction: column;
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
<?php
    session_start();
    if (isset($_SESSION["usuario"])) {
        include_once("header_user.php");
    } else {
        header("location: index.php");
        exit();
    }
?>
<main class="p-4 mt-4">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-primary text-center">Imagen</th>
            <th scope="col" class="text-primary text-center">Tipo</th>
            <th scope="col" class="text-primary text-center">Numero</th>
            <th scope="col" class="text-primary text-center">Nombre</th>
            <!-- EDITAR y ELIMINAR POKEMON -->
            <th scope="col" class="text-primary text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once("conexionBD.php");
        include_once ("consultas_sql.php");
        $pokemones = crearConexionBD(obtenerPokemones());
        echo mysqli_num_rows($pokemones);
        $row = mysqli_fetch_assoc($pokemones);

        if (mysqli_num_rows($pokemones) > 0){
            while ($row = mysqli_fetch_assoc($pokemones)){
                echo "<tr> <th scope='row' class='text-center w-25'> <a href='#'>";
                echo "<img src='". $row['imagen'] . "'" ."class='imagen-pokemon'> </a> </th>";
                echo "<td class='text-center'> <img src='". $row['tipo'] . "'> </td>";
                echo " <td class='text-center'>" . $row['id'] . "</td>";
                echo "<td class='text-center'> <a href='#' class='text-black text-decoration-none fw-bold'>". $row['nombre'] ."</a></td>";
                echo "<td class='text-center'>  <div class='d-flex justify-content-center mq'> <form action='' method='get'> <button type='submit' class='text-light btn btn-info'>Editar</button></form>";
                echo "<form action='' method='get'> <button type='submit' class='text-light btn btn-danger' style='background-color: firebrick!important; border-color: firebrick!important;'>Eliminar</button></form></div></td></tr>";
            }
        } else {
            echo "No se encontraron resultados";
        }
        /*
        echo "<tr> <th scope='row' class='text-center w-25'> <a href='#'>";
        echo "<img src='img/pokemones/bulbasaur.png' class='imagen-pokemon'> </a> </th>";
        echo "<td class='text-center'> <img src='img/tipos/tipo_planta.png'> </td>";
        echo " <td class='text-center'> 001 </td>";
        echo "<td class='text-center'> <a href='#' class='text-black text-decoration-none fw-bold'>". $row['nombre'] ."</a></td>";
            // EDITAR y ELIMINAR POKEMON
        echo "<td class='text-center'>  <div class='d-flex justify-content-center mq'> <form action='' method='get'> <button type='submit' class='text-light btn btn-info'>Editar</button></form>";
        echo "<form action='' method='get'> <button type='submit' class='text-light btn btn-danger' style='background-color: firebrick!important; border-color: firebrick!important;'>Eliminar</button></form></div></td></tr>";
        ?>
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
            <!-- EDITAR y ELIMINAR POKEMON -->
            <td class="text-center">
                <div class="d-flex justify-content-center mq">
                    <form action="" method="get">
                        <button type="submit" class="text-light btn btn-info">Editar</button>
                    </form>
                    <form action="" method="get">
                        <button type="submit"
                                class="text-light btn btn-danger"
                                style="background-color: firebrick!important; border-color: firebrick!important;">
                            Eliminar
                        </button>
                    </form>
                </div>
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
            <!-- EDITAR y ELIMINAR POKEMON -->
            <td class="text-center">
                <div class="d-flex justify-content-center mq">
                    <form action="" method="get">
                        <button type="submit" class="text-light btn btn-info">Editar</button>
                    </form>
                    <form action="" method="get">
                        <button type="submit"
                                class="text-light btn btn-danger"
                                style="background-color: firebrick!important; border-color: firebrick!important;">
                            Eliminar
                        </button>
                    </form>
                </div>
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
            <!-- EDITAR y ELIMINAR POKEMON -->
            <td class="text-center">
                <div class="d-flex justify-content-center mq">
                    <form action="" method="get">
                        <button type="submit" class="text-light btn btn-info">Editar</button>
                    </form>
                    <form action="" method="get">
                        <button type="submit"
                                class="text-light btn btn-danger"
                                style="background-color: firebrick!important; border-color: firebrick!important;">
                            Eliminar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        */
        ?>
        </tbody>
    </table>

    <a href="alta_pokemon.php" class="d-block">
        <h3 class="btn btn-success w-100 fw-bold fs-5">Agregar Pokemon</h3>
    </a>
</main>
<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>

