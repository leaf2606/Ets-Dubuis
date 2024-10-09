<?php
namespace Models;
class Getter
{
    public static function getuserInNewsletter(String $email) 
    {
        $bdd = Getpdo::getpdo();
        $q = $bdd->prepare('SELECT COUNT(*) FROM newsletter WHERE email=?');
        $q->execute([$email]);
        $res = $q->fetch();
        var_dump($res);
        exit();
        return $res;
    }
}