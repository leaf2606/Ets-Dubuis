<?php

// session_start();

// require_once("connect.php");

// var_dump($_SERVER['REQUEST_URI']);
// exit();


namespace Controllers;

class Newsletter {
    public function __construct($methode) {
        if (isset($methode)) {
            $this->$methode();
        } 
    }
    public function addUser()
    {
        var_dump($_POST);
        // Récupérer les données
        $email = $_POST["email"];

        // Faires des traitements
        Getter::getuserInNewsletter($email);
    }
}



?>