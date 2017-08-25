<?php

if (!isset($_GET['section']) OR $_GET['section'] == 'mainpage')
{
    include_once('vue/mainpage/mainpage.php');
}
else
{
	switch ($_GET['section'])
	{
		case 'mainwiki':
		include_once('vue/wiki/mainwiki.html');
		break;

		case 'mainforums':
		break;

		case 'maincommunaute':
		break;

		case 'connexion':
		include_once('vue/identification/connexion.php');
		break;

		case 'deconnexion':
		include_once('controleur/identification/deconnexion.php');
		break;

		case 'inscription':
		include_once('vue/identification/inscription.php');
		break;

		default:
			echo ("Sorry, nothing to see here.");
	}
}
