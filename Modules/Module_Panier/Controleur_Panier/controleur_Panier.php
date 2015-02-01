<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:01
 */
class ControleurPanier {

    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();

    }

    function ajoutPanier ($idArticle, $quantite) {
        $this->monModele->ajoutPanier($idArticle, $quantite);
    }

    function modifierArticlePanier ($idArticle, $quantite) {
        $this->monModele->modifierArticlePanier($idArticle, $quantite);
    }

    function supprimerArticlePanier ($idArticle) {
        $this->monModele->supprimerArticlePanier($idArticle);
    }

    function afficherPanier () {
        $req = $this->monModele->afficherPanier();
        $this->maVue->afficherPanier($req);
    }

}

?>

