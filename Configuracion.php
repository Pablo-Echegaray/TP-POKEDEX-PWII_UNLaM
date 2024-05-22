<?php
include_once("helper/Database.php");
include_once("helper/Router.php");
include_once("helper/MustachePresenter.php");
include_once("helper/Presenter.php");

include_once("model/PokemonsModel.php");

include_once("controller/PokemonsController.php");

include_once('vendor/mustache/src/Mustache/Autoloader.php');

class Configuracion{
 
    public static function getDatabase(){
        $config = self::getConfig();
        return new Database($config["servername"], $config["username"], $config["password"], $config["database"]);
    }

    private static function getConfig(){
        return parse_ini_file("config/config.ini");
    }

    public static function getPokemonsController(){
        return new PokemonsController(self::getPokemonsModel(), self::getPresenter());
    }

    public static function getPokemonsModel(){
        return new PokemonsModel(self::getDatabase());
    }

    public static function getRouter()
    {
        return new Router("getPokemonsController", "get");
    }

    public static function getPresenter(){
        return new MustachePresenter("view/template");
    }
}

?>