<?php
/*
	Auteur: Frapiccini Benoît
	Ces fonctions renvoient l'ensemble des informations liées à un pseudo
*/

function get_info($pseudo, $bdd)
{
    $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
        ));

    $result = $req->fetchAll();
    return $result;
}

function get_id($pseudo, $bdd)
{
    $req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
        ));

    $result = $req->fetch();
    return $result;
}

