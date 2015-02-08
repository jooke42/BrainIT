<?php

class ControleurCategorie {
    private $_vue;
    private $_Modele;
    function __construct () {
        $this->_vue = new VueCategorie();
        $this->_Modele = new ModeleCategorie();
    }

    function afficherArticle ($query) {
        $listeArticle = $this->_Modele->searchArticle($query);
        $this->_vue->afficherArticle($listeArticle);
    }
    function affichageProduitsParDefault(){
        $list=$this->_Modele->affichageProduitsParDefault();
        $this->_vue->afficherArticle($list);
    }


}