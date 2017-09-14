<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme récupère les commentaires dans l'intervale demandé (min inclus, max exclus) d'un utilisateur enregistré.

	/!\ Pour l'instant, on se limite aux 100 premiers commentaires
	/!\ Les données ne sont pas traitées comme dans l'index (par ex), car cela provoque une erreur de type "illegal string offset"
*/

include_once('modele/connexion_bdd.php');
include_once('modele/forums/commentaires.php');
include_once('modele/forums/billets.php');

// Vérification des données IN PROGRESS
$pseudo = secure_data($_GET['pseudo']);

$commentaires = commentaires_utilisateur(0, 100, $pseudo, $bdd);
foreach ($commentaires as $com) {
	$com['contenu']=secure_data($com['contenu']);
}

// On affiche la page (vue)
$_SESSION['dynamic_section'] = 'commentaires';
include_once("vue/forums/commentaires_utilisateur.php");
