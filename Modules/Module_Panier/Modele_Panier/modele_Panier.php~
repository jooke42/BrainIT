<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class ModelePanier extends DBMapper {


    function affichagePanierReq() {
        //$req=self::$database->prepare("");


    }
    function ajoutPanier($idArticle,$quantite) {
        $idClient=$_SESSION['idClient'];
        var_dump($idClient,$idArticle,$quantite);
        $req=self::$database->prepare("insert into Panier (idClient,idArticle,quantite) VALUES ('$idClient','$idArticle','$quantite')");
        $req->execute();


    }
}?>