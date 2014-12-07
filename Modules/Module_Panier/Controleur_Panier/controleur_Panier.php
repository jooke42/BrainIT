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
    function __construct($module) {

        $nomVue='Vue'.$module;
        $nomModele='Modele'.$module;

        $this->monModele=new $nomModele();
        $this->maVue=new $nomVue();
    }
    function afficherPanier() {
        $req=$this->monModele->afficherPanierReq();
        $this->maVue->afficherPanier($req);
    }

    function ajoutPanier($idArticle,$quantite) {
        $this->monModele->ajoutPanier($idArticle,$quantite);
    }


}

?>

