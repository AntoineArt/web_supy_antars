<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction renvoie la liste des billets (ou début de posts) rangés par date de création décroissante,
	et compris dans l'intervalle donné (le max étant exclusif et le min inclusif)
*/

function billets($min, $max, $bdd)
{
    // Au cas ou php aurait un doute (oui ça arrive)
    $min = (int) $min;
    $max = (int) $max;
    
    $req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr
       FROM billets ORDER BY date_creation DESC LIMIT :min, :max');
    // On force le type
    $req->bindParam(':min', $min, PDO::PARAM_INT);
    $req->bindParam(':max', $max, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetchAll();
    return $result;
}

/*
    Auteur: Frapiccini Benoît
    Cette fonction créée un nouveau billet dans la base de donnée à l'aide des données passées en argument.
    La date et l'heure sont récupérées par la fonction "NOW"
    
    /!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
    /!\ La fonction renvoie l'id du dernier élément inséré !
*/

function nouveau_billet($titre, $contenu, $pseudo, $bdd)
{
    $req = $bdd->prepare('INSERT INTO billets(titre, contenu, auteur, date_creation) VALUES(:titre, :contenu, :pseudo, NOW())');
    $req->execute(array(
        'titre' => $titre,
        'contenu' => $contenu,
        'pseudo' => $pseudo
        ));

    $id = $bdd->prepare('SELECT Max(id) FROM billets');
    $id->execute(array(
        'pseudo' => $pseudo,
        'titre' => $titre,
        'contenu' => $contenu
        ));
    $id = $id->fetchColumn(); // /!\ fetchColums et non pas fetch

    return $id;
}