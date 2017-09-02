<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet l'inscription d'un nouvel utilisateur à la base de donnée.

	/!\ Les mots de passe sont toujours stockés sous forme cryptée dans la base de donnée !
*/

if(isset($_POST['pseudo']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']) AND isset($_POST['email'])){
	include_once('modele/connexion_bdd.php');
	include_once('modele/identification/inscription.php');
	include_once('modele/identification/get_pseudo.php');
	include_once('controleur/_fonctions/is_email.php');
	include_once('controleur/_securite/secure_post');

	// Vérification des informations IN PROGRESS
	$pseudo = htmlentities($_POST['pseudo']);
	$mdp = htmlentities($_POST['mdp']);
	$mdp2 = htmlentities($_POST['mdp2']);
	$email = htmlentities($_POST['email']);

	// Vérification des conditions
	$liste = get_pseudo($pseudo, $bdd);
	$mail = is_email($email);
	if ($liste){
		// Le pseudo existe déjà
		$_SESSION['error'] = 2;
		include_once("vue/identification/inscription.php"); 
	}
	elseif($mdp != $mdp2){
		// Les mots de passe ne sont pas identiques
		$_SESSION['error'] = 3;
		include_once("vue/identification/inscription.php"); 
	}
	elseif(!$mail){
		// L'adresse mail est invalide
		$_SESSION['error'] = 4;
		include_once("vue/identification/inscription.php"); 
	}
	else{
		// Les informations respectent les conditions
		// Hachage du mot de passe
		$mdpS = hash('sha512',$mdp);
		// Inscription effective
		inscription($pseudo, $mdpS, $email, $bdd);

		header('location: _main.php?section=dynamic_section');
		exit();
	}
}
else{
	include_once("vue/identification/inscription.php");
}