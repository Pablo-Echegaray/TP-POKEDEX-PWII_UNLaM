<?php
class PokemonsController
{
    private $model;
    private $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function get()
    {
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $admin = $this->model->getAdministrador($user, $pass);
            if ($admin) {
                $_SESSION["usuario"] = $user;
                $this->renderViewAdministrador();
                return 0;
            } else {
                echo "Necesita ser administrador para loguearse";
            }

        } else {
            $this->search();
        }
    }

    public function renderViewAdministrador()
    {
        $pokemones = $this->model->getPokemones();
        $this->presenter->render("view/pokemonsView.mustache", ["pokemones" => $pokemones, "esAdministrador" => true, "nombreUsuario" => $_SESSION['usuario']]);
    }

    public function search()
    {
        $busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : null;
        $noExiste = "";

        if ($busqueda !== null) {
            $pokemones = $this->model->searchPokemones($busqueda);
        } else {
            $pokemones = $this->model->getPokemones();
        }

        if (is_string($pokemones)) {
            $noExiste = $pokemones;
            $pokemones = $this->model->getPokemones();
        }

        $this->presenter->render("view/pokemonsView.mustache", ["pokemones" => $pokemones, "error" => $noExiste]);
    }


    public function getInfoPokemon()
    {
        if (isset($_GET['pokemon_id'])) {
            $pokemon_id = $_GET['pokemon_id'];
            $pokemon = $this->model->getPokemon($pokemon_id);
            $this->presenter->render("view/infoPokemonsView.mustache", ["pokemones" => $pokemon]);
        } else {
            echo "Pokemon no encontrado.";
        }
    }

    public function add()
    {
        $this->presenter->render("view/agregarPokemonsView.mustache", ["esAdministrador" => true, "nombreUsuario" => $_SESSION['usuario']]);
    }

    public function procesarAlta()
    {

        $num = $_POST["numero"] ?? "";
        $nombre = $_POST["nombre"] ?? "";
        $pokemon = $_FILES["pokemon"] ? $_FILES["pokemon"]["name"] : "";
        $tipo = $_FILES["tipo"] ? $_FILES["tipo"]["name"] : "";
        $img_pokemon = "public/img/pokemones/" . $pokemon;
        $img_tipo = "public/img/tipos/" . $tipo;
        $descripcion = $_POST["descripcion"] ?? "";

        if (empty($num) || empty($pokemon) || empty($nombre) || empty($tipo) || empty($descripcion)) {
            echo "Por favor complete todos los campos.";
            return;
        }

        if ($this->model->existePokemon($num)) {
            echo "Ya existe un Pokémon con el mismo número.";
            return;
        }

        $this->model->addPokemones($num, $img_pokemon, $nombre, $img_tipo, $descripcion);
        $this->renderViewAdministrador();
    }

    public function delete()
    {
        if (isset($_POST['pokemon_id'])) {
            $pokemon_id = $_POST['pokemon_id'];
            $this->model->deletePokemones($pokemon_id);
            $this->renderViewAdministrador();
            return 0;
        } else {
            echo "Id de pokemones no válido: ";
            return 0;
        }
    }

    public function edit()
    {
        $pokemon_id = isset($_POST['pokemon_id']) ? $_POST['pokemon_id'] : null;
        $pokemon = $this->model->getPokemon($pokemon_id);
        $this->presenter->render("view/modificarPokemonsView.mustache", ["pokemon" => $pokemon, "esAdministrador" => true, "nombreUsuario" => $_SESSION['usuario']]);
    }


    public function modifyPokemon()
    {
        $pokemon_id = $_POST["pokemon_id"] ?? "";
        $this->model->modifyPokemon($pokemon_id);
        $this->renderViewAdministrador();
    }
}