<?php
if (!defined('TEST_INCLUDE')) {
    throw new Exception ("Vous ne pouvez pas acceder directement à ce fichier");
}
include_once("/../Module_Article/Modele_Article/modele_Article.php");
include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
include_once("Vue_" . $module . "/vue_" . $module . ".php");
include_once("Modele_" . $module . "/modele_" . $module . ".php");


class Panier extends Module {

    function __construct () {


        $module = get_class($this);
        $nomControleur = 'Controleur' . $module;
        $monControleur = new $nomControleur($module);

        if (!isset($action)) {

            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 0;
            }
        }

        if (isset($_GET['idArticle'])) {
            $idArticle = $_GET['idArticle'];

        } else {
            $idArticle = NULL;
        }

        if (isset($_GET['quantite'])) {
            $quantite = $_GET['quantite'];

        }else {
            $quantite = 1;
        }
        switch ($action) {
            case 0:
                $monControleur->afficherPanier();
                break;
            case 1:
                $monControleur->ajoutPanier($idArticle, $quantite);
                break;
            case 2:

                foreach ( $_POST as $idArticle=>$quantite) {

                $monControleur->modifierArticlePanier($idArticle, $quantite);
                 }
                header("Refresh: 0;URL='index.php?Module=Panier'");
                break;
            case 3:
                $monControleur->supprimerArticlePanier($idArticle);
                break;
            default:
                $monControleur->afficherPanier();
                break;
        }
    }
}

?>
