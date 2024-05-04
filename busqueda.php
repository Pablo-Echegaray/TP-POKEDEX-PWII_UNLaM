<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'conexionBD.php';
    include_once 'consultas_sql.php';

    if (isset($_GET['buscar'])) {
        $busqueda = buscarPokemones($_GET['buscar']);
    } else {
        $busqueda = obtenerPokemones();
    }

    $result = crearConexionBD($busqueda);
    echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col' class='text-primary text-center'>Imagen</th>
                        <th scope='col' class='text-primary text-center'>Tipo</th>
                        <th scope='col' class='text-primary text-center'>Numero</th>
                        <th scope='col' class='text-primary text-center'>Nombre</th>
                    </tr>
                </thead>
                <tbody>";
    if(!is_string($result)){
        if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='info_pokemon.php?id=" . $row['id'] . "'>";
                echo "<tr>";
                echo "<th scope='row' class='text-center w-25'><img src='" . $row['imagen'] . "' class='imagen-pokemon'></th>";
                echo "<td class='text-center'>";

                $tipo = $row['tipo'];
                echo "<img class='mq-tip text-center w-75' src='" . $tipo . "'>";

                echo "</td>";
                echo "<td class='text-center'>" . $row['numero_identificador'] . "</td>";
                echo "<td class='text-center'><a href='info_pokemon.php?id=" . $row['id'] . "' class='text-black text-decoration-none fw-bold'>" . $row['nombre'] . "</a></td>";
                echo "</td></a>";

                if (isset($_SESSION["usuario"])) {
                    echo "<td class='text-center'>";
                    echo "<div class='d-flex justify-content-center mq'>";
                    // EDITAR POKEMON
                    echo "<form action='formulario_modificar_pokemon.php' method='post'>";
                    echo "<input type='hidden' name='pokemon_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='text-light btn btn-info'>Editar</button>";
                    echo "</form>";

                    // ELIMINAR POKEMON
                    echo "<form action='dar_de_baja_pokemon.php' method='post'>";
                    echo "<input type='hidden' name='pokemon_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='text-light btn btn-danger' style='background-color: firebrick!important; border-color: firebrick!important;'>Eliminar</button>";
                    echo "</form>";

                    echo "</div>";
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
    }else {
        echo "<h2>Pokemon no encontrado</h2><br>";
    }
    ?>

</body>

</html>