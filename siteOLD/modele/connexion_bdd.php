<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet de se connecter à la base de donnée via $bdd.
	Un catch empêche le renvoi d'un message dangereux pour la sécurité du site en cas de problème
	de connexion à la base de donnée.

	/!\ Ce fichier n'est pas tracké par Git ; il ne sera pas mis à jour
*/

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=WebSA', 'root', 'root');
	//$bdd = new PDO('mysql:host=localhost;dbname=WebSA', 'root', '');

}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
