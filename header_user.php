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
    <form action="" method="get" class="d-flex flex-column align-items-center">
        <h2 class="centrar m-0 fs-4">Busca tu POKEMON!</h2>
        <div class="input-group">
            <input type="search" name="buscar" placeholder="Ingrese el nombre, tipo o número de pokemon" class="form-control w-75 p-3">
            <button type="submit" class="btn text-light fw-bold w-25">¿Quien es este pokemon?</button>
        </div>
    </form>
</header>
