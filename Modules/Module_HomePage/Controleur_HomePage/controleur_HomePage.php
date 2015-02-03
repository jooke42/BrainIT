<<<<<<< HEAD
<?php

class ControleurHomePage {
    protected $_vue;

    function __construct () {
        $this->_vue = new VueHomePage();
    }

    function afficherHomePage ($listeTopArticle) {
        $this->_vue->afficherHomePage($listeTopArticle);
    }
=======
<?php

class ControleurHomePage {
    protected $_vue;

    function __construct () {
        $this->_vue = new VueHomePage();
    }

    function afficherHomePage ($listeTopArticle) {
        $this->_vue->afficherHomePage($listeTopArticle);
    }
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
}