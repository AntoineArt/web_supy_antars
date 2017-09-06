<?php
/*
	Auteur : Artillan Antoine

*/	

	include_once('modele/connexion_bdd.php');
	include_once('modele/wiki/mainwiki.php');

	if(!isset($_SESSION['article_wiki'])){
	$_SESSION['article_wiki']="mainwiki";
	}

	$sections = sections($bdd);
	include_once("vue/wiki/mainwiki.php");
