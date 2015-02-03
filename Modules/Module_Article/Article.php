<?php
if (! defined ('TEST_INCLUDE'))
    die ("Vous ne pouvez pas acceder directement à ce fichier");

include_once("Controleur_".$module."/controleur_".$module.".php");
include_once("Vue_".$module."/vue_".$module.".php");
include_once("Modele_".$module."/modele_".$module.".php");

class Article extends Module {
    function __construct() {
		 include_once("Modules/Module_Photo/Controleur_Photo/controleur_Photo.php");
        include_once("Modules/Module_Photo/Modele_Photo/modele_Photo.php");
        include_once("Modules/Module_Photo/Vue_Photo/vue_Photo.php");

        $nomControleurPhoto='ControleurPhoto';
		$monControleurPhoto=new $nomControleurPhoto("Photo");
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
         switch($action) {
            case 0:
                
                $monControleur->affichagePageArticle($monControleurPhoto);

             break;
             case "affichageArticle":
                $monControleur->affichagePageArticle($modulePhoto->monControleur);
             break;
            case "pageActiverDesactiverArticle":
                $monControleur->affichagePageActiverDesactiverArticle();
             break;
             case "activerArticle":
                $monControleur->activerArticle();
             break;
             case "desactiverArticle":
                $monControleur->desactiverArticle();
             break;
             case "creerArticle":
                $monControleur->creerArticle();
             break;
             case "modifierArticle":
                $monControleur->modifierArticle();
             break;
             case "modifierArticleSelection":
                $monControleur->modifierArticleSelection();
             break;
             case "affichageCreerArticle":
                $monControleur->AffichageCreerArticle();
             break;
             case "affichageModifierArticle":
                $monControleur->affichageModifierArticle();
             break;
            default:
                echo "default";
                break;
        }
    }

}



?>
