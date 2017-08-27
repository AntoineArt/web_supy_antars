<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme récupère les commentaires dans l'intervale demandé (min inclus, max exclus).

	/!\ pour l'instant, on se limite aux 100 premiers commentaires
*/

include_once("modele/connexion_bdd.php");
include_once("modele/forums/commentaires.php");

//Vérification des données IN PROGRESS
$id_billet = $_GET["billet"];

$commentaires = commentaires(0, 100, $id_billet, $bdd);

// On traite les données récupérées
foreach($commentaires as $cle => $commentaires)
{
    // La fonction nl2br permet d'afficher les sauts de ligne du texte
    // Les mots trop longs seront cassés par le css de toute façon
    $commentaires[$cle]['contenu'] = nl2br(htmlspecialchars($commentaires['contenu']));
}

// On affiche la page (vue)
include_once("vue/forums/commentaires.php");
