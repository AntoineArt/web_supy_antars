<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme est le coeur du site : Il s'occupe de construire les pages que l'utilisateur verra.
	Toutes les pages pointent sur lui, et elles lui fournissent dans l'URL l'identifiant des éléments à afficher.
	Par défaut, la page affichée est la page d'accueil.
	Les pages étant incluses en cascade, c'est également ce programme qui gère le démarrage des sessions et qui appelle
	les scripts globaux.

	/!\ Il est primordial pour le fonctionnement et la sécurité du site de respecter l'inclusion en cascade !
	/!\ Les liens vers d'autres fichiers auront toujours comme origine la racine, car les pages sont construites ici !
*/

session_start();
$_SESSION['error']="<br>"; // Afin de respecter les tailles des boites
include_once('controleur/fonctions/secure.php');
include_once('controleur/compte/autoconnect.php');
include_once('controleur/compte/maj_session.php'); // On remet à jour les parametres de session

// On regarde d'abord si l'utilisateur est nouveau
if(!isset($_GET['section'])){
	include_once('vue/mainpage/mainpage.php');
}
else{
	// On sécurise l'entrée
	$data = secure_data($_GET['section']);
	// On regarde ensuite si on est renvoyé sur une section dynamique
	if($data == 'dynamic_section'){
		$section = $_SESSION['dynamic_section'];
	}
	// Sinon, on utilise la redirection de l'URL
	else{
		$section = $data;
	}

	switch ($section){
		// Mainpage
		case 'mainpage':
		include_once('controleur/mainpage/mainpage.php');
		break;

		// Wiki
		case 'mainwiki':
		include_once('controleur/wiki/mainwiki.php');
		break;

		case 'pagewiki':
		include_once('controleur/wiki/page_articles.php');
		break;

		// Forums
		case 'mainforums':
		include_once('controleur/forums/mainforums.php');
		break;

		case 'nouveauBillet':
		include_once('controleur/forums/nouveauBillet.php');
		break;

		case 'commentairesBillet':
		include_once('controleur/forums/commentairesBillet.php');
		break;

		case 'nouveauCommentaire':
		include_once('controleur/forums/nouveauCommentaire.php');
		break;

		case 'commentairesUtilisateur':
		include_once('controleur/forums/commentairesUtilisateur.php');
		break;

		// Compte
		case 'profil':
		include_once('controleur/compte/profil.php');
		break;

		case 'deconnexion':
		include_once('controleur/compte/deconnexion.php');
		break;

		case 'inscription':
		include_once('controleur/compte/inscription.php');
		break;

		// Playground

		// Rip
		default:
		echo ('Sorry, nothing to see here.');
	}
}
