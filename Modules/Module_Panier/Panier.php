<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 15:53
 */

if (! defined ('TEST_INCLUDE'))
    die ("Vous ne pouvez pas acceder directement à ce fichier");

include_once("Controleur_".$module."/controleur_".$module.".php");
include_once("Vue_".$module."/vue_".$module.".php");
include_once("Modele_".$module."/modele_".$module.".php");

class Panier extends Module {

    function __construct() {


        $module = get_class($this);
        $nomControleur = 'Controleur'.$module;
        $monControleur = new $nomControleur($module);

        if(!isset($action)) {

            if(isset($_GET['action'])) 
                $action = $_GET['action'];
            
            else 
                $action = 0;
            
        }

        if(isset($_GET['idArticle'])) 
            $idArticle = $_GET['idArticle'];
        
        else 
            $article = NULL;
        

        if(isset($_GET['quantite'])) 
            $quantite = $_GET['quantite'];
        
        else 
            $quantite = 1;

        switch($action) {

            case 0:

                $monControleur->afficherPanier();
                break;

            case 1:

                $monControleur->ajoutPanier($idArticle, $quantite);
                break;

            case 2:

               	$monControleur->modifierArticlePanier($idArticle, $quantite);
                break;

            case 3:

                $monControleur->supprimerArticlePanier($idArticle);
                break;

            /*case 4:

                $this->controleurPanier->calculPrixTotalPanier();
                break;*/

            default:

                $monControleur->afficherPanier();
                break;

        }
    }
}
?>
