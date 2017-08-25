<?php 

session_start();
// Suppression de la session
$_SESSION = array(); // Par sécurité, supression des variables de session
session_destroy();

// Suppression des cookies
setcookie('login', '');
setcookie('mdpS', '');

header('Location: ./_main.php?section=mainpage');
exit();