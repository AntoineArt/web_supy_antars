<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction créée un nouveau billet dans la base de donnée à l'aide des données passées en argument.
	La date et l'heure sont récupérées par la fonction "NOW"
	
	/!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
	/!\ La fonction renvoie l'id du dernier élément inséré !
*/

function nouveau_billet($titre, $contenu, $pseudo, $bdd)
{
	$req = $bdd->prepare('INSERT INTO billets(titre, contenu, auteur, date_creation) VALUES(:titre, :contenu, :pseudo, NOW())');
	$req->execute(array(
	    'titre' => $titre,
	    'contenu' => $contenu,
	    'pseudo' => $pseudo
	    ));

	include('modele/connexion_bdd.php');
	//Because fuck Max()
	$id = $bdd->prepare('SELECT id FROM billets ORDER BY id DESC LIMIT 1');
	$id->execute();
	$id = $id->fetch();
	$id = (int) $id;

	return $id;
}