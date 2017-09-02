<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet une connection automatique de l'utilisateur.
	Il lit dans les cookies si la connection automatique est activée avant d'en extraire 
	l'identifiant et le mot de passe (crypté).

	/!\ L'identifiant est unique pour chaque utilisateur !
*/

if(isset($_COOKIE['autoconnect']) AND isset($_COOKIE['pseudo']) AND isset($_COOKIE['mdpS'])){
	include_once("modele/connexion_bdd.php");
	include_once("modele/identification/connexion.php");

	// Sécurisation des informations
	$pseudo = secure_bdd(secure_get($_COOKIE['pseudo']));
	$mdpS = secure_bdd(secure_get($_COOKIE['mdpS']));

	// On vérifie si le couple id/mdpS est dans la base de données
	//FAILLE DE SECURITE ; VERIFIER LE COUPLE ID/MDP AVANT
	if(liste_comptes($pseudo, $mdpS, $bdd)){
		setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
		setcookie('mdpS', $mdpS, time() + 365*24*3600, null, null, false, true);
		setcookie('autoconnect', 1, time() + 365*24*3600, null, null, false, true);
		$_SESSION['pseudo'] = $pseudo;

	}
}