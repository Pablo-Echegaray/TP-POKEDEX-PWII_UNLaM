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

function updatePokemon($pokemon){
    $id = intval($pokemon['id']);
    $numero = intval($pokemon['numero']);
    $nombre = $pokemon['nombre'];
    $pokemon_img = $pokemon['pokemones'];
    $tipo = $pokemon['tipo'];
    $descripcion = $pokemon['descripcion'];

    $query = "UPDATE pokemones SET numero_identificador = $numero, imagen = '$pokemon_img', nombre = '$nombre', tipo = '$tipo', descripcion = '$descripcion' WHERE id = $id";
    return $query;
}
?>