<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme récupère les billets dans l'intervale demandé (min inclus, max exclus).

	/!\ pour l'instant, on se limite aux 20 premiers billets
*/

include_once('modele/connexion_bdd.php');
include_once('modele/forums/billets.php');
$billets = billets(0, 20, $bdd);

// On traite les données récupérées
foreach($billets as $cle => $billet){
	// L'affichage est sécurisé avec le htmlspecialchars
	$billets[$cle]['titre'] = secure_data($billet['titre']);
	// La fonction nl2br permet d'afficher les sauts de ligne du texte
	// Les mots trop longs seront cassés par le css de toute façon
	$billets[$cle]['contenu'] = nl2br(secure_data($billet['contenu']));
}

// On affiche la page (vue)
$_SESSION['dynamic_section'] = 'mainforums';
include_once('vue/forums/index.php');
