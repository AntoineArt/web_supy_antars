<?php
/*
	Auteur : Artillan Antoine
*/

	include_once('modele/connexion_bdd.php');
	include_once('modele/wiki/mainwiki_functions.php');

	if(!isset($_GET['id_section_wiki']) OR !isset($_GET['article'])){
		$sections = sections($bdd);
		include_once("vue/wiki/mainwiki.php");
	}

	else {
		$articles = get_articles_id_by_section_id($_GET['id_section_wiki'], $bdd);
		include_once("vue/wiki/mainwiki.php");
	}
