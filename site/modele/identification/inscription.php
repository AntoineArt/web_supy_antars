<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction inscrit un nouvel utilisateur dans la base de donnée à l'aide des données passées en
	argument. La date est récupérée à l'aide de "CURDATE".

	/!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
*/

	function inscription($pseudo, $mdpS, $email, $bdd)
	{
		$req = $bdd->prepare('INSERT INTO membres(pseudo, mdp, email, date_inscription) VALUES(:pseudo, :mdp, :email, CURDATE())');
		$req->execute(array(
			'pseudo' => $pseudo,
			'mdp' => $mdpS,
			'email' => $email
			));
	}