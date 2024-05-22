<header>
    <div class="d-flex p-2  justify-content-between align-items-center bg-warning">
        <img src="img/logo_pokemon.png" alt="Logo de Pokemon" class="imagen">
        <h1 class="m-0">
            <a href="index.php" class="text-dark text-decoration-none">
                Pokedex
            </a>
        </h1>
        <div class="p-2">
            <?php
            echo "<p class='m-0 fs-4'>Hola ". "<span class='fw-bold'>" .$_SESSION["usuario"]. "</span>" ."</p>";
            ?>
        </div>
    </div>
</header>
