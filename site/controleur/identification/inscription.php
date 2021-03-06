<?php
/*
	Auteur: Frapiccini Benoît
	Ce programme permet l'inscription d'un nouvel utilisateur à la base de donnée.

	/!\ Les mots de passe sont toujours stockés sous forme cryptée dans la base de donnée !
*/

if(isset($_POST['pseudo']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']) AND isset($_POST['email'])){
	include_once('modele/connexion_bdd.php');
	include_once('modele/identification/inscription.php');
	include_once('modele/identification/get_info.php');
	include_once('controleur/fonctions/is_valid_email.php');
	include_once('controleur/fonctions/is_valid_password.php');

	// Sécurisation des informations
	$pseudo = secure_bdd(secure_data($_POST['pseudo']));
	$mdp = secure_bdd(secure_data($_POST['mdp']));
	$mdp2 = secure_data($_POST['mdp2']);
	$email = secure_bdd(secure_data($_POST['email']));

	// Vérification des conditions
	$liste = get_info($pseudo, $bdd);
	$mail = is_valid_email($email);
	if ($liste){ // On réserve le nom default
		// Le pseudo existe déjà
		$_SESSION['error'] = "Ce pseudo n'est pas disponible";
		include_once('vue/identification/inscription.php'); 
	}
	elseif ($pseudo == ''){
		//Le pseudo est vide
		$_SESSION['error'] = "Il doit y avoir un pseudo";
		include_once('vue/identification/inscription.php'); 
	}
	elseif($mdp != $mdp2){
		// Les mots de passe ne sont pas identiques
		$_SESSION['error'] = 'Les mots de passe doivent êtres identiques';
		include_once('vue/identification/inscription.php'); 
	}
	elseif(!is_valid_password($mdp)){
		// Le mot de passe n'est pas valide
		$_SESSION['error'] = 'Le mot de passe doit avoir au moins 6 caractères (maj et min)';
		include_once('vue/identification/inscription.php'); 
	}
	elseif(!$mail){
		// L'adresse mail est invalide
		$_SESSION['error'] = "L'adresse mail n'est pas valide";
		include_once('vue/identification/inscription.php'); 
	}
	else{
		// Les informations respectent les conditions
		// Hachage du mot de passe
		$mdpS = encode_password($mdp, $pseudo);
		// Inscription effective
		inscription($pseudo, $mdpS, $email, $bdd);
		$name = $pseudo;
		$name .= '.jpeg';
		copy('ressources/images/default.jpeg', 'ressources/avatars/' . $name);

		header('location: _main.php?section=dynamic_section');
		exit();
	}
}
else{
	include_once('vue/identification/inscription.php');
}