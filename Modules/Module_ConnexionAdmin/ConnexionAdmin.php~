<?php
if (! defined ('TEST_INCLUDE'))
    die ("Vous ne pouvez pas acceder directement à ce fichier");

include_once("Controleur_".$module."/controleur_".$module.".php");
include_once("Vue_".$module."/vue_".$module.".php");
include_once("Modele_".$module."/modele_".$module.".php");

class Connexion extends Module {
    function __construct() {

        $module=get_class($this);
        $nomControleur='Controleur'.$module;
        $monControleur=new $nomControleur($module);
        if(!isset($action)) {
            if(isset($_GET['action'])) {
                $action=$_GET['action'];
            }
            else {
                $action=0;
            }
        }

        if(isset($_POST['email'])) {
            $email=$_POST['email'];
            $pass=$_POST['pass'];
        }

        switch($action) {
            case 0:
                
                $monControleur->affichageFormConnexion();
                break;

            case 1:
                $monControleur->connexion($email,$pass);
                break;

            case 2:
                
                echo "/!\ Mot de passe incorrect /!\ ";
                $monControleur->affichageFormConnexion();
                break;

            default:
                echo "default";
                break;
        }
    }

}



?>
