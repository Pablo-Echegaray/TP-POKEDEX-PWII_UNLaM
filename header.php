<header>
    <div class="d-flex p-2  justify-content-between align-items-center bg-warning">
        <img src="img/logo_pokemon.png" alt="Logo de Pokemon" class="imagen">
        <h1 class="m-0">
            <a href="index.php" class="text-dark text-decoration-none">
                Pokedex
            </a>
        </h1>
        <form action="login.php" method="post" class="flex">
            <label class="pb-1">
                <input type="text" placeholder="Usuario" name="user" class="form-control">
            </label>
            <label class="pt-1">
                <input type="password" placeholder="Contraseña" name="pass" class="form-control">
            </label>
            <button type="submit" class="btn btn-primary mt-2"> Ingresar </button>
        </form>
    </div>
</header>