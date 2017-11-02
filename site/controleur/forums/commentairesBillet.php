<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme récupère les commentaires dans l'intervale demandé (min inclus, max exclus).

	/!\ Pour l'instant, on se limite aux 100 premiers commentaires
	/!\ Les données ne sont pas traitées comme dans l'index (par ex), car cela provoque une erreur de type "illegal string offset"
*/

include_once('modele/connexion_bdd.php');
include_once('modele/forums/commentaires.php');

//Vérification des données IN PROGRESS
if(isset($_GET['billet'])){
	$id_billet = secure_data($_GET['billet']);
	$_SESSION['id_billet'] = $id_billet;
	$_SESSION['titre_billet'] = secure_data($_GET['titre']);

}
else{
	$id_billet = secure_data($_SESSION['id_billet']);
	$titre = secure_data($_SESSION['titre_billet']);
}

$commentaires = commentaires(0, 100, $id_billet, $bdd);
foreach ($commentaires as $com) {
	$com['contenu']=secure_data($com['contenu']);
}

// On affiche la page (vue)
$_SESSION['dynamic_section'] = 'commentaires';
include_once("vue/forums/commentairesBillet.php");
