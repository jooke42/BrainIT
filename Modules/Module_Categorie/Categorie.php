﻿<?php
if (!defined('TEST_INCLUDE')) {
    throw new Exception ("Vous ne pouvez pas acceder directement Ã  ce fichier");
}
include_once("Modules/Module_Article/Modele_Article/modele_Article.php");
include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
include_once("Vue_" . $module . "/vue_" . $module . ".php");
include_once("Modele_" . $module . "/modele_" . $module . ".php");

class Categorie extends Module {
    function __construct () {

        $module = get_class($this);
        $nomControleur = 'Controleur' . $module;
        $monControleur = new $nomControleur($module);
        $modele = new ModeleCategorie();
        if (!isset($action)) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 0;
            }
        }
        $order = isset($_GET['order']) ? $_GET['order'] : 'libelle';
        $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : null;
        $query = isset($_GET['query']) ? $_GET['query'] : null;
        switch ($action) {
            case 0:
                $monControleur->affichageProduitsParDefault();
                break;
            case 1:
                $monControleur->afficherArticle($query);
                break;
            default:

                break;
        }
    }

}


