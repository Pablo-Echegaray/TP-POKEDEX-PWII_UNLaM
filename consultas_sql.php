<?php

function obtenerPokemones(){
    $query = "SELECT * FROM pokemones";
    return $query;
}

function buscarPokemones($busqueda){
    $query = "SELECT * FROM pokemones   WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'";
    return $query;
}

function obtenerPokemon($pokemon_id){
    $query = "SELECT * FROM pokemones WHERE id = $pokemon_id";
    return $query;
}
?>