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

    $conn = crearConex();
    $result = mysqli_query($conn, $busqueda);

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

    if (mysqli_num_rows($result) == 0) {
        echo "<h2>Pokemon no encontrado</h2><br>";
        $result = mysqli_query($conn, obtenerPokemones());
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick=\"window.location='info_pokemon.php?id=" . $row['id'] . "'\" style=\"cursor: pointer;\">";
        echo "<th scope='row' class='text-center w-25'><img src='" . $row['imagen'] . "' class='imagen-pokemon'></th>";
        echo "<td class='text-center'>";

        $tipo = $row['tipo'];
        echo "<img src='" . $tipo . "' class='imagen-pokemon'>";

        echo "</td>";
        echo "<td class='text-center'>" . $row['numero_identificador'] . "</td>";
        echo "<td class='text-center fw-bold'>" . $row['nombre'] . "</td>";
        echo "</td>";
        echo "</td>";

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

    mysqli_close($conn);

    ?>

</body>

</html>