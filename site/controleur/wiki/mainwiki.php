<?php
/*
	Auteur : Artillan Antoine
*/

	include_once('modele/connexion_bdd.php');
	include_once('modele/wiki/mainwiki.php');

	if(!isset($_GET['id_section_wiki'])){
		$sections = get_sections($bdd);
		include_once("vue/wiki/mainwiki.php");
	}
