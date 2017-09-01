<?php

function get_billet($pseudo, $titre, $bdd)
{
	$req = $bdd->prepare('SELECT TOP 1 id FROM billets WHERE pseudo = :pseudo AND titre = :titre ORDER BY id DESC');
	$req->execute(array(
	    'pseudo' => $pseudo,
	    'titre' => $titre));

	$result = $req->fetch();
	return $result;
}
