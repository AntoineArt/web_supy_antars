<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction permet de récupérer l'id d'un billet correspondant à la description passée en argument
*/

function get_id_billet($pseudo, $titre, $bdd)
{
	$req = $bdd->prepare('SELECT id FROM billets WHERE pseudo = :pseudo AND titre = :titre ORDER BY date_creation DESC');
	$req->execute(array(
	    'pseudo' => $pseudo,
	    'titre' => $titre));

	$result = $req->fetch();
	return $result;
}
