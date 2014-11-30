<?php
if (! defined ('TEST_INCLUDE'))
    die ("Vous ne pouvez pas acceder directement à ce fichier");
  echo "bien".$module;
include_once("Controleur_".$module."/controleur_".$module.".php");
include_once("Vue_".$module."/vue_".$module.".php");
include_once("Modele_".$module."/modele_".$module.".php");

class Article extends Module {
    function __construct() {
              
        $module=get_class($this);
        $nomControleur='Controleur'.$module;
        $monControleur=new $nomControleur($module);

        echo "oklm";
        if(isset($_POST['idArticle'])) {
            $idArticle=$_POST['idArticle'];
        }

        if(!isset($action)) {
            if(isset($_GET['action'])) {
                $action=$_GET['action'];
            }
            else {
                $action=0;
            }
        }
        switch($action) {
            case 0:
                
                $monControleur->affichagePageArticle();

             break;

            default:
                echo "default";
                break;
        }
    }

}



?>
