<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet de mettre à jour les paramètres de session d'un utilisateur.

	/!\ Ce programme doit être appelé avant chaque chargement de page par sécurité
*/

if(isset($_SESSION['pseudo'])){
	include_once("modele/connexion_bdd.php");
	include_once("modele/identification/get_info");

	$_SESSION['droit'] = get_droit($_SESSION['pseudo'], $bdd);
}
