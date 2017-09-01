<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction créée un nouveau commentaire dans la base de donnée à l'aide des données passées en argument.
	La date et l'heure sont récupérées par la fonction "NOW"

	/!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
*/

function nouveau_commentaire($id_billet, $pseudo, $contenu, $bdd)
{
	$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, contenu, date_commentaire) VALUES(:id_billet, :pseudo, :contenu, NOW())');
	$req->execute(array(
	    'id_billet' => $id_billet,
	    'pseudo' => $pseudo,
	    'contenu' => $contenu
	    ));
}
