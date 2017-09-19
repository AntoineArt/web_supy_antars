<?php
/*
	Auteur: Artillan Antoine
	Renvoie la liste des sections dans l'ordre de leur id croissant
*/

function get_sections($bdd)
{
	// préparation de la requête
	$req = $bdd->prepare('SELECT nom, description FROM sections_wiki ORDER BY id ASC');
  // exécution de la requête
  $req->execute();
	//création et renvoi de la variable
  $result = $req->fetchAll();
  return $result;
}
