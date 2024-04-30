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
        $sql = "SELECT * FROM pokemones WHERE nombre LIKE '%$busqueda%'";
    } else {
        $sql = "SELECT * FROM pokemones";
    }

    $conn = $_GET['conn'];

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "No se encontraron Pokemones";
        return;
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

        $tipo_1 = $row['tipo_1'];
        $tipo_2 = $row['tipo_2'];
        echo "<img src='img/tipos/" . "tipo_" . $tipo_1 . ".png'>";
        if ($tipo_2 != null) {
            echo "<img src='img/tipos/" . "tipo_" . $tipo_2 . ".png'>";
        }

        echo "</td>";
        echo "<td class='text-center'>" . $row['numero_identificador'] . "</td>";
        echo "<td class='text-center'><a href='#' class='text-black text-decoration-none fw-bold'>" . $row['nombre'] . "</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

    mysqli_close($conn);
    ?>

</body>

</html>