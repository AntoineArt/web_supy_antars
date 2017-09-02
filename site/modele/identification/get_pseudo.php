<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction renvoie la liste des billets (ou début de posts) rangés par date de création décroissante,
	et compris dans l'intervalle donné (le max étant exclusif et le min inclusif)
*/

function get_pseudo($pseudo, $bdd)
{
    $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
        ));

    $result = $req->fetchAll();
    return $result;
}
