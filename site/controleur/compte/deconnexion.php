<?php
/*
	Auteur: Frapiccini Benoît
	Ce programe permet la déconnection d'un utilisateur du site.
	Il supprime les informations de session avant de la fermer (idem pour les cookies).
*/

// Suppression de la session
//$_SESSION = array(); // Par sécurité, supression des variables de session
//session_destroy();
unset($_SESSION['pseudo']); //On préfèrera cette méthode pour préserver les sections dynamiques

// Suppression des cookies
setcookie('login', '', time() + 365*24*3600, null, null, false, true);
setcookie('mdpS', '', time() + 365*24*3600, null, null, false, true);
setcookie('autoconnect', '', time() + 365*24*3600, null, null, false, true);

header('location: _main.php?section=mainpage');
exit();
