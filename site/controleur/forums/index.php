<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme récupère les billets dans l'intervale demandé.
*/

include_once("modele/connexion_bdd.php");
include_once("modele/forums/billets.php");
$billets = billets(0, 10, $bdd);

// On traite les données récupérées
foreach($billets as $cle => $billet)
{
	// L'affichage est sécurisé avec le htmlspecialchars
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    // la fonction nl2br permet d'afficher les sautes de ligne du texte
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}

// On affiche la page (vue)
include_once("vue/forums/index.php");
