<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class ModelePanier extends DBMapper {

    function __construct () {
    }

    function ajoutPanier ($idArticle, $quantite) {

        $idClient = $_SESSION['idClient'];
        $reqSelect = static::$database->prepare("select idArticle from panier where idArticle=$idArticle and idClient=$idClient");
        $reqSelect->execute();

        if ($reqSelect->fetch()[0] == null) {

            $req = static::$database->prepare("insert into panier (idClient,idArticle,quantite) VALUES ('$idClient','$idArticle','$quantite')");
            $req->execute();

        } else {

            $this->modifierArticlePanier($idArticle, $quantite);

        }



    }

    function modifierArticlePanier ($idArticle, $quantite) {

        $idClient = $_SESSION['idClient'];
        $req = static::$database->prepare("update panier set quantite='$quantite' where idClient='$idClient' and idArticle='$idArticle'");
        $req->execute();

    }

    function supprimerArticlePanier ($idArticle) {

        $req = static::$database->prepare("delete from panier where idArticle='$idArticle'");
        $req->execute();
        header("Refresh: 0;URL='index.php?Module=Panier'");
    }

    function afficherPanier () {

        $idClient = $_SESSION['idClient'];
        $req = static::$database->prepare("select * from panier, article where idClient='$idClient' and panier.idArticle=article.idArticle");
        $req->execute();

        return $req;

    }

}

?>
