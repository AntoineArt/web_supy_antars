<?php 
/*
	Auteur: Frapiccini Benoît
	Ce programme permet la création d'un nouveau commentaire.

	/!\ On passe certaines informations dans la session à cause des limitations du header
*/

// Si le formulaire html a été rempli
if(isset($_POST['contenu']) AND isset($_SESSION['pseudo']))
{
	include_once("modele/connexion_bdd.php");
	include_once("modele/forums/nouveau_commentaire.php");

	// Vérification des informations IN PROGRESS
	$id_billet = $_SESSION['id_billet'];
	$pseudo = $_SESSION['pseudo'];
	$contenu = $_POST['contenu'];

	// Création du billet dans la bdd
	nouveau_commentaire($id_billet, $pseudo, $contenu, $bdd);

	//Passage des informations dans la session (le header ne peut en renvoyer qu'une dans l'URL)
	if(isset($_GET['titre'])){ //Au cas ou on créée plusieurs commentaires d'affilée
		$_SESSION['id_billet'] = $id_billet;
		$_SESSION['titre_billet'] = $_GET['titre'];
	}
	header("location: _main.php?section=commentaires");
	exit();
}
else
{
	include_once("vue/forums/nouveau_commentaire.php");
}