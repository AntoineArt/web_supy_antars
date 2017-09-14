<?php
/*
	Auteur: Frapiccini Benoît
	Cette fonction renvoie la liste des commentaires par date de création décroissante, et
    compris dans l'intervalle donné (le max étant exclusif et le min inclusif)
*/

function commentaires($min, $max, $id_billet, $bdd)
{
    //Au cas ou (sinon il peut râler)
    $min = (int) $min;
    $max = (int) $max;
    $id_billet = (int) $id_billet;

    $req = $bdd->prepare('SELECT id, id_billet, titre_billet, auteur, contenu, date_commentaire AS date_fr
       FROM commentaires WHERE id_billet=:id_billet ORDER BY date_commentaire LIMIT :min, :max');
    // On force le type
    $req->bindParam(':min', $min, PDO::PARAM_INT);
    $req->bindParam(':max', $max, PDO::PARAM_INT);
    $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetchAll();
    return $result;
}

/*
    Auteur: Frapiccini Benoît
    Cette fonction renvoie la liste des commentaires d'un utilisateur par date de création décroissante, et
    compris dans l'intervalle donné (le max étant exclusif et le min inclusif).
    On renvoie toutes les informations liées au commentaire.
*/

function commentaires_utilisateur($min, $max, $pseudo, $bdd)
{
    //Au cas ou (sinon il peut râler)
    $min = (int) $min;
    $max = (int) $max;
    $pseudo = (string) $pseudo;

    $req = $bdd->prepare('SELECT id, id_billet, titre_billet, auteur, contenu, date_commentaire AS date_fr
       FROM commentaires WHERE auteur=:pseudo ORDER BY date_commentaire DESC LIMIT :min, :max');
    // On force le type
    $req->bindParam(':min', $min, PDO::PARAM_INT);
    $req->bindParam(':max', $max, PDO::PARAM_INT);
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();

    $result = $req->fetchAll();
    return $result;
}


/*
    Auteur: Frapiccini Benoît
    Cette fonction créée un nouveau commentaire dans la base de donnée à l'aide des données passées en argument.
    La date et l'heure sont récupérées par la fonction "NOW"

    /!\ La requête est préparée avant d'être éxécutée afin de protéger la base de donnée !
*/

function nouveau_commentaire($id_billet, $titre_billet, $pseudo, $contenu, $bdd)
{
    $req = $bdd->prepare('INSERT INTO commentaires(id_billet, titre_billet, auteur, contenu, date_commentaire) VALUES(:id_billet, :titre_billet, :pseudo, :contenu, NOW())');
    $req->execute(array(
        'id_billet' => $id_billet,
        'titre_billet' => $titre_billet,
        'pseudo' => $pseudo,
        'contenu' => $contenu
        ));
}
