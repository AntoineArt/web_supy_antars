<?php 
/*
	Auteur: Frapiccini Benoît
	Ce programme permet la connextion d'un utilisateur à sa page de profil.
	En cas de moficfications, il vérifie les informations et met à jour la base de donnée.
	
	/!\ L'identifiant est unique pour chaque utilisateur !
*/

// Si le formulaire html a été rempli
if(isset($_SESSION['pseudo']) AND (isset($_POST['pseudo']) OR (isset($_POST['mdp']) AND isset($_POST['mdp2'])) OR isset($_POST['email']))){
	include_once('modele/connexion_bdd.php');
	include_once('modele/identification/update.php');
	include_once('modele/identification/get_info.php');
	$id = get_id($_SESSION['pseudo'], $bdd)['id'];

	// Modification du pseudo
	if(isset($_POST['pseudo'])){
		// Sécurisation des informations
		$pseudo = secure_bdd(secure_data($_POST['pseudo']));
		$liste = get_info($pseudo, $bdd);

		// Verification des informations
		if ($liste){
			// Le pseudo existe déjà
			$_SESSION['error'] = 2;
		}
		else{
			// MAJ du pseudo
			update_pseudo($pseudo, $id, $bdd);
			// MAJ de la session
			$_SESSION['pseudo'] = $pseudo;
		}
	}

	// Modification du mot de passe
	elseif(isset($_POST['mdp']) AND isset($_POST['mdp2'])){
		// Sécurisation des informations
		$mdp = secure_bdd(secure_data($_POST['mdp']));
		$mdp2 = secure_bdd(secure_data($_POST['mdp2']));

		// Vérification des conditions
		if($mdp != $mdp2){
			// Les mots de passe ne sont pas identiques
			$_SESSION['error'] = 3;
		}
		else{
			// MAJ du mdp
			update_mdp($mdp, $id, $bdd);
		}
	}

	// Modification de l'adresse mail
	elseif(isset($_POST['email'])){
		// Sécurisation des informations
		$email = secure_bdd(secure_data($_POST['pseudo']));
		$mail = is_email($email);

		// Vérification des conditions
		if(!$mail){
			// L'adresse mail est invalide
			$_SESSION['error'] = 4;
		}
		else{
			// MAJ de l'email
			update_email($email, $id, $bdd);
		}
	}

	// Neverused
	else{
		$_SESSION['error'] = 1;
	}
}
// On affiche toujours la page
include_once('vue/identification/profil.php');
