<?php 

include_once('../../modele/connexion_bdd.php');
include_once('../../modele/identification/inscription.php');

// Vérification des informations IN PROGRESS
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

$mdpS = hash('sha512',$_POST['mdp']); // Hachage du mot de passe

// Inscription effective
inscription($pseudo, $mdpS, $email, $bdd);

header('location: ../../_main.php?section=connexion');
exit();
