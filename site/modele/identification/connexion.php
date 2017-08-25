<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction renvoie la liste des comptes présents dans la base de donnée dont l'identifiant et le
	mot de passe (crypté) correspondent à ceux passés en argument

	/!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
*/

function liste_comptes($pseudo, $mdpS, $bdd) // Liste des comptes qui correspondent aux informations (1 seul normalement)
{
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND mdp = :mdp');
$req->execute(array(
    'pseudo' => $pseudo,
    'mdp' => $mdpS));

$result = $req->fetch();
return $result;
}