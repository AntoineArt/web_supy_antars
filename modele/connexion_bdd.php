<?php
//Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=WebSA', 'root', 'root');
    //$bdd = new PDO('mysql:host=localhost;dbname=WebSA', 'root', ''); si WAMP

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}