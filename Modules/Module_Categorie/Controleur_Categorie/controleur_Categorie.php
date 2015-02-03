<<<<<<< HEAD
<?php

class ControleurCategorie {
    private $_vue;

    function __construct () {
        $this->_vue = new VueCategorie();
    }

    function afficherArticle ($listeArticle) {
        $this->_vue->afficherArticle($listeArticle);
    }


=======
<?php

class ControleurCategorie {
    private $_vue;

    function __construct () {
        $this->_vue = new VueCategorie();
    }

    function afficherArticle ($listeArticle) {
        $this->_vue->afficherArticle($listeArticle);
    }


>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
}