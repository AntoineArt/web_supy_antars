<?php
/*
	Auteur : Artillan Antoine

*/

	include_once('modele/connexion_bdd.php');
	include_once('modele/wiki/page_sections.php');

	if(!isset($_SESSION['article_wiki'])){
	$_SESSION['article_wiki']="page_sections";
	}

	$sections = articles($bdd);
	include_once("vue/wiki/page_sections.php");
