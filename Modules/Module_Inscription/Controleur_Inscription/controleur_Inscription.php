<<<<<<< HEAD
<?php

class ControleurInscription {
    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();
    }

    function affichageFormInscription () {
        $this->maVue->affichageFormInscription();
    }

    function nouveauUser ($nom, $prenom, $genre, $pass, $passConf, $email, $datNais, $telephone) {

        $this->monModele->nouveauUser($nom, $prenom, $genre, $pass, $passConf, $email, $datNais, $telephone);
    }

}

?>
=======
<?php

class ControleurInscription {
    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();
    }

    function affichageFormInscription () {
        $this->maVue->affichageFormInscription();
    }

    function nouveauUser ($nom, $prenom, $genre, $pass, $passConf, $email, $datNais, $telephone) {

        $this->monModele->nouveauUser($nom, $prenom, $genre, $pass, $passConf, $email, $datNais, $telephone);
    }

}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
