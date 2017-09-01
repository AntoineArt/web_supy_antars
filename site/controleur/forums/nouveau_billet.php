<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet la création d'un nouveau billet.
*/

// Si le formulaire html a été rempli
if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_SESSION['pseudo']))
{

	include_once("modele/connexion_bdd.php");
	include_once("modele/forums/nouveau_billet.php");
	include_once("modele/forums/get_billet.php");
	include_once("modele/forums/nouveau_commentaire.php");

	// Vérification des informations IN PROGRESS
	$titre = $_POST['titre'];
	$contenu = $_POST['contenu'];
	$pseudo = $_SESSION['pseudo'];

	// Création du billet dans la bdd
	nouveau_billet($titre, $contenu, $pseudo, $bdd);
	// Ajout du contenu du billet comme premier commentaire du billet
	$com = get_billet($pseudo, $titre, $bdd);
	nouveau_commentaire($com, $pseudo, $contenu, $bdd);

	header('location: _main.php?section=mainforums');
	exit();
}
else
{
	include_once("vue/forums/nouveau_billet.php");
}
