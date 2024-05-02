<?php

function obtenerPokemones(){
    $query = "SELECT * FROM pokemones";
    return $query;
}

function buscarPokemones($busqueda){
    $query = "SELECT * FROM pokemones   WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'";
    return $query;
}

?>