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
unset($_SESSION['error']);
include_once('controleur/fonctions/secure.php');
include_once('controleur/identification/autoconnect.php');
include_once('controleur/identification/maj_session.php'); // On remet à jour les parametres de session 

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
		include_once('vue/mainpage/mainpage.php');
		break;

		// News
		case 'mainnews':
		break;

		// Wiki
		case 'mainwiki':
		include_once('controleur/wiki/mainwiki.php');
		break;

		// Forums
		case 'mainforums':
		include_once('controleur/forums/index.php');
		break;

		case 'nouveau_billet':
		include_once('controleur/forums/nouveau_billet.php');
		break;

		case 'commentaires':
		include_once('controleur/forums/commentaires.php');
		break;

		case 'nouveau_commentaire':
		include_once('controleur/forums/nouveau_commentaire.php');
		break;

		// Identification
		case 'profil':
		include_once('controleur/identification/profil.php');
		break;

		case 'connexion':
		include_once('controleur/identification/connexion.php');
		break;

		case 'deconnexion':
		include_once('controleur/identification/deconnexion.php');
		break;

		case 'inscription':
		include_once('controleur/identification/inscription.php');
		break;

		// Rip
		default:
		echo ('Sorry, nothing to see here.');
	}
}
