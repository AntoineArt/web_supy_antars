<?php
/*
	Auteur: Frapiccini Benoît
	Ces fonctions sécurisent une donnée devant être utilisée par le site

    /!\ Ce fichier n'a pas besoin d'être inclus, car il l'est automatiquement pas le _main !
*/

function secure_bdd($data)
{
	// Cas int
	if(ctype_digit($data))
    {
        $data = intval($data);
    }
    // Autres cas
    else
    {
        $data = string($data);
        $data = addcslashes($data, '%_');
    }

    return $data;
}

function secure_data($data)
{
    $data = htmlentities($data);

    return $data;
}
