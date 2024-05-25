<?php

class AdministradoresModel{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getAdministrador($user, $pass){
        return $this->database->query("SELECT * FROM administradores WHERE user ='$user' AND pass ='$pass'");
    }
}