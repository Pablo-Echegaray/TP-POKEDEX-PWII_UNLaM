<?php

/*
 * Funciones que faltan:
 * Verificar que el numero y/o nombre del pokemon no este en la BD. Esto en "validarNumero"
 * */
function validarNumero($numeroPokemon){
    if (isset($_POST["numero"]) && $_POST["numero"]>0){
        $numeroPokemon = $_POST["numero"];
        return $numeroPokemon;
    } else {
        die("Numero Incorrecto");
    }
}
function validarNombre($nombrePokemon){
    if (isset($_POST["nombre"])){
        $nombrePokemon = $_POST["nombre"];
        return $nombrePokemon;
    } else {
        die("Nombre Incorrecto");
    }
}
function validarImagen($imagenPokemon){
    if (isset($_FILES["pokemon"])) {
        $nombrePokemon = $_FILES['pokemon']['name'];
        $typePokemon = $_FILES['pokemon']['type'];
        $tamPokemon = $_FILES['pokemon']['size'];
        $tempPokemon = $_FILES['pokemon']['tmp_name'];

        $datosImg = array(
            "name" => $nombrePokemon,
            "type" => $typePokemon,
            "size" => $tamPokemon,
            "tmp_name" => $tempPokemon
        );
        return $datosImg;
    } else {
        die("No se han enviado archivos");
    }
}
//Mostrando imagen
$numero = validarNumero($_POST["numero"]);
$nombre = validarNombre($_POST["nombre"]);
$imagen = validarImagen($_FILES["pokemon"]);
foreach ($imagen as $img){
    echo "<p>$img</p>";
}

?>