<?php 

if(isset($_POST['pseudo']) AND isset($_POST['mdp']))
{
	include_once("modele/connexion_bdd.php");
	include_once("modele/identification/connexion.php");

	// Vérification des informations IN PROGRESS
	$pseudo=$_POST['pseudo'];


	$mdpS = hash('sha512', $_POST['mdp']);

	$liste = liste_comptes($pseudo, $mdpS, $bdd);

	if (!$liste)
	{
		$_SESSION['error'] = 1;
	    include_once("vue/identification/connexion.php");
	}
	else
	{
	    //$_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $pseudo;
	    header("location: _main.php?section=mainpage");
	    exit();
	}
}
else
{
	include_once("vue/identification/connexion.php");
}