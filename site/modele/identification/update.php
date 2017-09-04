<?php
/*
	Auteur: Frapiccini Benoît
	Ces fonctions mettent à jour les informations des membres.

	/!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
*/

function update_pseudo($pseudo, $id, $bdd)
{
	$req = $bdd->prepare('UPDATE membres SET pseudo = :pseudo WHERE id = :id');
	$req->execute(array(
		'pseudo' => $pseudo,
		'id' => $id,
		));
}

function update_mdp($pseudo, $id, $bdd)
{
	$req = $bdd->prepare('UPDATE membres SET mdp = :mdp WHERE id = :id');
	$req->execute(array(
		'mdp' => $mdp,
		'id' => $id,
		));
}

function update_email($pseudo, $id, $bdd)
{
	$req = $bdd->prepare('UPDATE membres SET email = :email WHERE id = :id');
	$req->execute(array(
		'email' => $email,
		'id' => $id,
		));
}