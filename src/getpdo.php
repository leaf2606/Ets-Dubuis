<?php
use PDO;
class Getpdo
{
    public static function __construct()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ETS-Dubuis', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }   
}