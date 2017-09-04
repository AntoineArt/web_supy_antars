<?php 
/*
	Auteur: Frapiccini Benoît
	Ce programme permet la connextion d'un utilisateur à sa page de profil.
	En cas de moficfications, il vérifie les informations et met à jour la base de donnée.
	
	/!\ L'identifiant est unique pour chaque utilisateur !
*/

// Si le formulaire html a été rempli
if(isset($_SESSION['pseudo']) AND (isset($_POST['pseudo']) OR (isset($_POST['mdp']) AND isset($_POST['mdp2'])) OR isset($_POST['email']) OR isset($_FILES['avatar']))){
	include_once('modele/connexion_bdd.php');
	include_once('modele/identification/get_info.php');
	include_once('modele/identification/update.php');
	$id = get_id($_SESSION['pseudo'], $bdd)['id'];

	// Modification du pseudo
	if(isset($_POST['pseudo'])){
		// Sécurisation des informations
		$pseudo = secure_bdd(secure_data($_POST['pseudo']));
		$liste = get_info($pseudo, $bdd);

		// Verification des informations
		if ($liste){
			// Le pseudo existe déjà
			$_SESSION['error'] = "Ce pseudo n'est pas disponible";
		}
		else{
			// MAJ du pseudo
			update_pseudo($pseudo, $id, $bdd);
			$_SESSION['pseudo'] = $pseudo;
			setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
		}
	}

	// Modification du mot de passe
	elseif(isset($_POST['mdp']) AND isset($_POST['mdp2'])){
		include_once('controleur/fonctions/is_valid_password.php');
		// Sécurisation des informations
		$mdp = secure_bdd(secure_data($_POST['mdp']));
		$mdp2 = secure_bdd(secure_data($_POST['mdp2']));

		// Vérification des conditions
		if($mdp != $mdp2){
			// Les mots de passe ne sont pas identiques
			$_SESSION['error'] = 'Les mots de passe doivent êtres identiques';
		}
		elseif(!is_valid_password($mdp)){
			// Le mot de passe n'est pas valide
			$_SESSION['error'] = 'Le mot de passe doit avoir au moins 6 caractères, dont majuscules, minuscules et chiffres';
		}
		else{
			// MAJ du mdp
			update_mdp($mdp, $id, $bdd);
			$mdpS = hash('sha512', $mdp);
			setcookie('mdpS', $mdpS, time() + 365*24*3600, null, null, false, true);
		}
	}

	// Modification de l'adresse mail
	elseif(isset($_POST['email'])){
		include_once('controleur/fonctions/is_valid_email.php');
		// Sécurisation des informations
		$email = secure_bdd(secure_data($_POST['pseudo']));

		// Vérification des conditions
		if(!$is_valid_email($email)){
			// L'adresse mail est invalide
			$_SESSION['error'] = "l'adresse mail est invalide";
		}
		else{
			// MAJ de l'email
			update_email($email, $id, $bdd);
		}
	}

	elseif(isset($_FILES['avatar'])){
		// On vérifie que le fichier est bien un .jpeg
		$extensions_autorises = array('.jpeg'); // A compléter
		$extension = strrchr($_FILES['avatar']['name'], '.'); // On récupère la fin de la chaîne
		if(!in_array($extension, $extensions_autorises)) // Si l'extension n'est pas dans le tableau
		{
			$_SESSION['error'] = 'Il faut fournir une image en au format JPEG';
		}
		else{
			$name = $_SESSION['pseudo'];
			$name .= $extension;
			// On tente d'uploader
			if(!move_uploaded_file($_FILES['avatar']['tmp_name'], 'ressources/avatars/' . $name)){
        		$_SESSION['error'] = "Echec de l'upload de l'image";
     		}
		}
	}

	// Neverused
	else{
		$_SESSION['error'] = 'Erreur dans le traitement, réessayez s.v.p';
	}
}
// On affiche toujours la page
include_once('vue/identification/profil.php');
