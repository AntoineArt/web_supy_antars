<?php 

include_once('../../modele/connexion_bdd.php');
include_once('../../modele/identification/connexion.php');

// Vérification des informations IN PROGRESS
$pseudo=$_POST['pseudo'];


$mdpS = hash('sha512', $_POST['mdp']);

$liste = liste_comptes($pseudo, $mdpS, $bdd);

if (!$liste)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    /*session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;*/
    echo 'Vous êtes connecté !';
}