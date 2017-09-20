<?php
/*
	Auteur : Artillan Antoine
*/

	include_once('modele/connexion_bdd.php');
	include_once('modele/wiki/page_articles.php');

	if(isset($_GET['id_section_wiki'])){
		$articles = get_articles($_GET['id_section_wiki'], $bdd);
		include_once("vue/wiki/page_articles.php");
		}
