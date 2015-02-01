<?php
if (!defined('TEST_INCLUDE')) {
    throw new Exception ("Vous ne pouvez pas acceder directement à ce fichier");
}
include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
include_once("Vue_" . $module . "/vue_" . $module . ".php");
include_once("Modele_" . $module . "/modele_" . $module . ".php");


$module = 'Article';

$nomControleur = 'Controleur' . $module;
$monControleur = new $nomControleur($module);


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 1;
}


switch ($action) {
    case 1:

        $monControleur->affichagePageArticle();

        break;
    case "affichageArticle":
        $monControleur->affichagePageArticle();
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
        echo "oklm";
        $monControleur->AffichageCreerArticle();
        break;
    case "affichageModifierArticle":
        $monControleur->affichageModifierArticle();
        break;
    default:
        echo "default";
        break;

}


?>
