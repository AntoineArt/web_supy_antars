<?php 

session_start();
include_once('../../modele/connexion_bdd.php');
include_once('../../modele/identification/connexion.php');

// Vérification des informations IN PROGRESS
$pseudo=$_POST['pseudo'];


$mdpS = hash('sha512', $_POST['mdp']);

$liste = liste_comptes($pseudo, $mdpS, $bdd);

if (!$liste)
{
    header('location:./vue/identification/connexion.php?error=1');
    exit();
}
else
{
    //$_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    header('location:../../_main.php?section=mainpage');
    exit();
}