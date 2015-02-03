<?php

if (!defined('TEST_INCLUDE')){
    throw new Exception ("Vous ne pouvez pas acceder directement à ce fichier");
}
include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
include_once("Vue_" . $module . "/vue_" . $module . ".php");
include_once("Modele_" . $module . "/modele_" . $module . ".php");

class Profil extends Module {

    function __construct () {
        $module = get_class($this);
        $nomControleur = 'Controleur' . $module;
        $monControleur = new $nomControleur($module);

        if (!isset($actionProfil)) {
            if (isset($_GET['actionProfil'])) {
                $actionProfil = $_GET['actionProfil'];
            } else {
                $actionProfil = 0;
            }
        }

        switch ($actionProfil) {
            case 0:
                //Affichage des informations de l'utilisateur
                $monControleur->affichageProfil();
                break;

            case 1:
                $monControleur->modifierInfo();
                break;

            case 2:

                break;

            case 3:

                break;

            default:

                break;
        }
    }
}


?>
