<?php

class ControleurHomePage {
    protected $_vue;

    function __construct () {
        $this->_vue = new VueHomePage();
    }

    function afficherHomePage ($listeTopArticle) {
        $this->_vue->afficherHomePage($listeTopArticle);
    }
}