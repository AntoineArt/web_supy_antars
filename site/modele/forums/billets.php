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
    // Les paramètres de fonction sont importants, sinon les valeurs ne seront pas respectées (en plus des bugs !)
        $req->bindParam(':min', $min, PDO::PARAM_INT);
        $req->bindParam(':max', $max, PDO::PARAM_INT);
        $req->execute();

        $result = $req->fetchAll();
        return $result;
    }
