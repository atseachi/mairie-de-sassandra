<?php

session_start();

$user = 'root';
$pass = '';

try{
    $bdd = new PDO ('mysql:host=localhost;dbname=mairie', $user, $pass);
}catch(PDOException $e)
{
    print "Erreur :". $e->getMessage() ."<br/>";
    die;
}



