<?php
if (!defined('TEST_INCLUDE')) {
    throw new Exception ("Vous ne pouvez pas acceder directement � ce fichier");
}
include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
include_once("Vue_" . $module . "/vue_" . $module . ".php");
include_once("Modele_" . $module . "/modele_" . $module . ".php");

class Commande extends Module {

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
        switch ($action) {
            case 0:
                $monControleur->creationCommande();
                break;
            case 1:
                //$monControleur->envoieMontantPaiement($idCommande);//TODO $idCommande inconnu
                break;
            case 2:
                $monControleur->recuConfirmation();
                break;
            default:
                $monControleur->afficherCommande();
                break;
        }
    }
}

