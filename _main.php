<?php

if (!isset($_GET['section']) OR $_GET['section'] == 'mainpage')
{
    include_once('vue/mainpage/mainpage.php');
}
else
{
	switch ($_GET['section'])
	{
		case 'wiki_main':
		include_once('vue/wiki/mainwiki.html');
		break;

		case 'forums_main':
		break;

		case 'communaute_main':
		break;

		case 'connexion':
		include_once('vue/identification/connexion.php');
		break;

		case 'deconnexion':
		include_once('vue/identification/deconnexion.php');
		break;

		case 'inscription':
		include_once('vue/identification/inscription.php');
		break;

		default:
			echo ("Sorry, nothing to see here.");
	}
}
