<<<<<<< HEAD
<?php

class ControleurConnexion {
    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();


    }

    function affichageFormConnexion () {
        $this->maVue->affichageFormConnexion();
    }

    function connexion ($email, $pass) {
        $this->monModele->connexion($email, $pass);

    }
}

?>
=======
<?php

class ControleurConnexion {
    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();


    }

    function affichageFormConnexion () {
        $this->maVue->affichageFormConnexion();
    }

    function connexion ($email, $pass) {
        $this->monModele->connexion($email, $pass);

    }
}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
