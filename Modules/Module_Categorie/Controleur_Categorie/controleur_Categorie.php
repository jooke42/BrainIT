<?php

class ControleurCategorie {
    private $_vue;

    function __construct () {
        $this->_vue = new VueCategorie();
    }

    function afficherArticle ($listeArticle) {
        $this->_vue->afficherArticle($listeArticle);
    }


}