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
        $busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : null;

        if ($busqueda !== null) {
            $pokemones = $this->model->searchPokemones($busqueda);
        } else {
            $pokemones = $this->model->getPokemones();
        }

        $this->presenter->render("view/pokemonsView.mustache", ["pokemones" => $pokemones]);
    }

    public function add()
    {
        $this->presenter->render("view/agregarPokemonsView.mustache");
    }

    public function procesarAlta()
    {
        //falta
        $num = $_POST["numero"];
        $nombre = $_POST["nombre"];
        $img_pokemon = $_FILES["pokemon"]["name"];
        $img_tipo = $_FILES["tipo"]["name"]; 
        $descripcion = $_POST["descripcion"];

        $this->model->addPokemones($num, $nombre, $img_pokemon, $img_tipo, $descripcion);
        header("location:");
        exit();
    }

    public function delete()
    {
        if (isset($_POST['pokemon_id'])) {
            $pokemon_id = $_POST['pokemon_id'];
            $this->model->deletePokemones($pokemon_id);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Id de pokemon no válido: ";
            exit;
        }
    }

    public function edit()
    {
        $this->presenter->render("view/modificarPokemonsView.mustache");
    }
}

?>