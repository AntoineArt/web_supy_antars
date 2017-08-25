<?php
function liste_comptes($pseudo, $mdpS, $bdd) // Liste des comptes qui correspondent aux informations (1 seul normalement)
{
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND mdp = :mdp');
$req->execute(array(
    'pseudo' => $pseudo,
    'mdp' => $mdpS));

$result = $req->fetch();
return $result;
}