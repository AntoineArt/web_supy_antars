<?php
function inscription($pseudo, $mdpS, $email, $bdd) // Inscription d'un nouveau membre
{
$req = $bdd->prepare('INSERT INTO membres(pseudo, mdp, email, date_inscription) VALUES(:pseudo, :mdp, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'mdp' => $mdpS,
    'email' => $email
    ));
}