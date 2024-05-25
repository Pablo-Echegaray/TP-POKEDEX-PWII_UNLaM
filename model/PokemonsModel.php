<?php

class PokemonsModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPokemones()
    {
        return $this->database->query("SELECT * FROM pokemones");
    }

    public function addPokemones($num, $pokemon, $nombre, $tipo, $descripcion)
    {
        $this->database->execute(
            "INSERT INTO pokemones(numero_identificador,imagen,nombre,tipo,descripcion)
                VALUES ('$num','$pokemon','$nombre','$tipo','$descripcion')"
        );
    }

    public function deletePokemones($pokemon_id)
    {
        $this->database->execute("DELETE FROM pokemones WHERE id = $pokemon_id");
    }

    public function searchPokemones($busqueda)
    {
        return $this->database->query("SELECT * FROM pokemones WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'");
    }

    public function getAdministrador($user, $pass){
        return $this->database->query("SELECT * FROM administradores WHERE user = '".$user."' && pass = '".$pass."'");
    }
}