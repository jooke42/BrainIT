<?php

if (!defined('TEST_INCLUDE')){
    throw new Exception ("Vous ne pouvez pas acceder directement à ce fichier");

}
class Photo extends Module {

    function __construct () {

        $module = get_class($this);

        include_once("Controleur_" . $module . "/controleur_" . $module . ".php");
        include_once("Vue_" . $module . "/vue_" . $module . ".php");
        include_once("Modele_" . $module . "/modele_" . $module . ".php");

        $nomControleur = 'Controleur' . $module;
        $monControleur = new $nomControleur($module);

        if (!isset($actionPhoto)) {
            if (isset($_GET['actionPhoto'])) {
                $actionPhoto = $_GET['actionPhoto'];
            } else {
                $actionPhoto = 0;
            }
        }

        if (isset($_POST['MAX_FILE_SIZE'])) {

            $maxsize = $_POST['MAX_FILE_SIZE'];

        } else {
            $titre = null;
            $description = null;
            $maxsize = null;
        }
        if (isset($_GET['idArticle'])) {
            $idArticle = $_GET['idArticle'];
        } else {
            $idArticle = NULL;
        }
        if (isset($_FILES['photo'])) {
            $destination = 'Assets/photo/' . $_FILES['photo']['name'];
        } else {
            $destination = NULL;
        }
        switch ($actionPhoto) {
            case 0:
                $monControleur->affichagePhotoArticle($idArticle);
                break;
            case 1:

                $upload = $monControleur->uploadPhoto($idArticle, 'photo', $destination, $maxsize, array('png', 'gif', 'jpg', 'jpeg'));

                break;

            case 2:
                $monControleur->affichagePhotoArticleComplet();
                break;
            case 3:
                $monControleur->affichageFormPhoto();
                break;
            default:

                break;

        }
    }
}


?>


