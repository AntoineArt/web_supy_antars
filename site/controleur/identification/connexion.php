<?php 
/*
	Auteur: Frapiccini Benoît
	Ce programme permet la connexion d'un utilisateur au site.
	Il vérifie les informations de connexion et les passe en paramètre de session.
	
	/!\ L'identifiant est unique pour chaque utilisateur !
	/!\ Une fois connecté, cette page devient inaccessible !
*/

// Si le formulaire html a été rempli
if(isset($_POST['pseudo']) AND isset($_POST['mdp']))
{
	//Connexion à la base de donnée et importation de la fonction liste_compte
	include_once("modele/connexion_bdd.php");
	include_once("modele/identification/connexion.php");

	// Vérification des informations IN PROGRESS
	$pseudo = $_POST['pseudo'];

	//On crypte le mot de passe pour effectuer la vérification
	$mdpS = hash('sha512', $_POST['mdp']);

	//On vérifie si le couple id/mdpS est dans la base de données
	$liste = liste_comptes($pseudo, $mdpS, $bdd);

	if (!$liste)
	{
		// On renvoie une erreur à la page html
		$_SESSION['error'] = 1;
	    include_once("vue/identification/connexion.php"); 
	}
	else
	{
		// On connecte l'utilisateur
		if(isset($_POST['autoconnect'])){
			setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
			setcookie('mdpS', $mdpS, time() + 365*24*3600, null, null, false, true);
			setcookie('autoconnect', '1', time() + 365*24*3600, null, null, false, true);
		}
	    $_SESSION['pseudo'] = $pseudo;
	    header("location: _main.php?section=mainpage");
	    exit();
	}
}
// Si le formulaire html n'a pas été rempli
else
{
	include_once("vue/identification/connexion.php");
}