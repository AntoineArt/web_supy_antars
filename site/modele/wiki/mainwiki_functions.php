<?php
/*
	Auteur: Artillan Antoine
	Renvoie la liste des sections dans l'ordre de leur id croissant
*/

function sections($bdd)
{
	// préparation de la requête
	$req = $bdd->prepare('SELECT nom, description FROM sections_wiki ORDER BY id ASC');
  // exécution de la requête
  $req->execute();
	//création et renvoi de la variable
  $result = $req->fetchAll();
  return $result;
	
}

function get_articles_id_by_section_id($id_section, $bdd)
{
	// préparation de la requête
	$req = $bdd->prepare('SELECT nom FROM page_articles JOIN sections_wiki ON page_articles.id_section=sections_wiki.id WHERE sections_wiki.id=:id_section ORDER BY article_wiki.id ASC ');
	$req->bindParam(':id_section', $id_section, PDO::PARAM_INT);
  // exécution de la requête
  $req->execute();
	//création et renvoi de la variable
  $result = $req->fetchAll();
  return $result;
}
