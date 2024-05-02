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

<?php
/*include_once "conexionBD.php";*/
$conn = new mysqli("localhost", "root", "", "pokedex");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $pokemon_id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pokemones WHERE id = $pokemon_id");

    if(mysqli_num_rows($result) > 0) {
        $pokemon = mysqli_fetch_assoc($result);
        ?>

        <main class="p-4 mt-4 info-flex">
            <div> <!--imagen del pokemon-->
                <img src="<?php echo $pokemon['imagen']; ?>" class="w-100 info-img">
            </div>
            <div class="d-flex flex-column justify-content-evenly align-items-center">
                <div> <!--tipo-->
                    <img src="<?php echo $pokemon['tipo']; ?>">
                </div>
                <h3><?php echo $pokemon['numero_identificador']; ?> <?php echo $pokemon['nombre']; ?></h3> <!--número y nombre-->
                <p> <!--descripcion-->
                    <?php echo $pokemon['descripcion']; ?>
                </p>
            </div>

        </main>

        <?php
    } else {
        echo 'No se encontró el Pokémon.';
    }
    mysqli_free_result($result);
}
mysqli_close($conn);
?>

<!--
<footer>
USAR INCLUDE_ONCE
</footer>
-->
</body>
</html>