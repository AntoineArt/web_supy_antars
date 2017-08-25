<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet l'inscription d'un nouvel utilisateur à la base de donnée.

	/!\ Les mots de passe sont toujours stockés sous forme cryptée dans la base de donnée !
*/

if(isset($_POST['pseudo']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']) AND isset($_POST['email']))
{
	include_once('modele/connexion_bdd.php');
	include_once('modele/identification/inscription.php');

	// Vérification des informations IN PROGRESS
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];

	$mdpS = hash('sha512',$_POST['mdp']); // Hachage du mot de passe

	// Inscription effective
	inscription($pseudo, $mdpS, $email, $bdd);

	header('location: _main.php?section=connexion');
	exit();
}
else
{
	include_once("vue/identification/inscription.php");
}