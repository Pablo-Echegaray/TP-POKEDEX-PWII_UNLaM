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

    public function getPokemon($pokemon_id){
        return $this->database->query_for_one("SELECT * FROM pokemones WHERE id = $pokemon_id");
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
        return $this->database->query("SELECT * FROM pokemones WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'") ? $this->database->query("SELECT * FROM pokemones WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero_identificador = '$busqueda'"): "El pokemon no existe";
    }

    public function getAdministrador($user, $pass){
        return $this->database->query("SELECT * FROM administradores WHERE user = '".$user."' && pass = '".$pass."'");
    }

    public function modifyPokemon($pokemon_id){
        $modifiedPokemon = $this->generateModifiedPokemon($pokemon_id);

        $id = intval($modifiedPokemon['id']);
        $numero = intval($modifiedPokemon['numero']);
        $nombre = $modifiedPokemon['nombre'];
        $pokemon_img = $modifiedPokemon['pokemon'];
        $tipo = $modifiedPokemon['tipo'];
        $descripcion = $modifiedPokemon['descripcion'];

        return $this->database->execute("UPDATE pokemones SET numero_identificador = $numero, imagen = '$pokemon_img', nombre = '$nombre', tipo = '$tipo', descripcion = '$descripcion' WHERE id = $id");
    }

    private function updateImgPokemon($actual_path_img, $name, $folder){
        // Verificar si se ha enviado un archivo
        if (isset($_FILES[$name]) && $_FILES[$name]['size'] > 0){
            $file_name = $_FILES[$name]['name'];
            $file_size = $_FILES[$name]['size'];
            $file_tmp = $_FILES[$name]['tmp_name'];
            $file_type = $_FILES[$name]['type'];

            $upload_folder = './img/' . $folder;
            $path_img = $upload_folder."/".$file_name;

            if(move_uploaded_file($file_tmp,$path_img)){
                echo "El archivo " . $file_name ." se subió correctamente";
            }else{
                echo "El archivo " . $file_name ." no se pudo subir.";
            }
            //exit();

        }
        else{
            $path_img = $actual_path_img;
        }
        return $path_img;
    }

    private function generateModifiedPokemon($pokemon_id){
        $pokemon = $this->getPokemon($pokemon_id);
        $imagenPokemon = $this->updateImgPokemon($pokemon['imagen'], 'pokemon', 'pokemones');
        $imagenTipo = $this->updateImgPokemon($pokemon['tipo'], 'tipo', 'tipos');
        $modifiedPokemon = array(
            "id" => $pokemon['id'],
            "numero" => $_POST['numero'],
            "nombre"   => $_POST['nombre'],
            "pokemon"  => $imagenPokemon,
            "tipo"  => $imagenTipo,
            "descripcion"  => $_POST['descripcion']
        );
        return $modifiedPokemon;
    }
}