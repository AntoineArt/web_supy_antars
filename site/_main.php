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
$_SESSION['error']=0;
include_once("controleur/identification/autoconnect.php");

if (!isset($_GET['section']) OR $_GET['section'] == 'mainpage')
{
    include_once("vue/mainpage/mainpage.php");
}
else
{
	switch ($_GET['section'])
	{
		case 'mainwiki':
		include_once("vue/wiki/mainwiki.html");
		break;

		case 'mainforums':
		include_once("controleur/forums/index.php");
		break;

		case 'maincommunaute':
		break;

		case 'connexion':
		include_once("controleur/identification/connexion.php");
		break;

		case 'deconnexion':
		include_once("controleur/identification/deconnexion.php");
		break;

		case 'inscription':
		include_once("controleur/identification/inscription.php");
		break;

		default:
			echo ("Sorry, nothing to see here.");
	}
}
