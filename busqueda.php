<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    require_once 'conexionBD.php';

    if (isset($_GET['buscar'])) {
        $busqueda = $_GET['buscar'];
        $sql = "SELECT * FROM pokemones   WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'";
    } else {
        $sql = "SELECT * FROM pokemones";
    }

    $conn = $_SESSION['conn'];

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Pokemon no encontrado";
        $result = mysqli_query($conn, "SELECT * FROM pokemones");
    }

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

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope='row' class='text-center w-25'><img src='img/pokemones/" . $row['imagen'] . ".png" . "' class='imagen-pokemon'></th>";
        echo "<td class='text-center'>";

        $tipo = $row['tipo'];
        echo "<img src='img/tipos/" . "tipo_" . $tipo . ".png'>";

        echo "</td>";
        echo "<td class='text-center'>" . $row['numero_identificador'] . "</td>";
        echo "<td class='text-center'><a href='#' class='text-black text-decoration-none fw-bold'>" . $row['nombre'] . "</a></td>";
        echo "</td>";

        if (isset($_SESSION["usuario"])) {
            echo "<td class='text-center'>";
            echo "<div class='d-flex justify-content-center mq'>";
            // EDITAR POKEMON
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='pokemon_id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='text-light btn btn-info'>Editar</button>";
            echo "</form>";

            // ELIMINAR POKEMON
            echo "<form action='eliminar.php' method='post'>";
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