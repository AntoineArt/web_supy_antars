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

    $req = $bdd->prepare('SELECT auteur, contenu, date_commentaire AS date_fr
       FROM commentaires WHERE id_billet=:id_billet ORDER BY date_commentaire LIMIT :min, :max');
    // On force le type
    $req->bindParam(':min', $min, PDO::PARAM_INT);
    $req->bindParam(':max', $max, PDO::PARAM_INT);
    $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetchAll();
    return $result;
}
