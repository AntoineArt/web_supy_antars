<?php
/*
	Auteur: Artillan Antoine
	Renvoie la liste des sections dans l'ordre de leur id croissant
*/

function get_articles($id_section, $bdd)
{
	// préparation de la requête
	$req = $bdd->prepare('SELECT nom, id FROM page_articles JOIN sections_wiki ON page_articles.id_section=sections_wiki.id WHERE sections_wiki.id=:id_section ORDER BY article_wiki.id ASC ');
	$req->bindParam(':id_section', $id_section, PDO::PARAM_INT);
	// exécution de la requête
	$req->execute();
	//création et renvoi de la variable
	$result = $req->fetchAll();
	return $result;
}
