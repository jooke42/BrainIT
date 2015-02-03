<?php

class ControleurProfil {
    public $maVue;
    public $monModele;
    public $monControleurPhoto;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->monModele = new $nomModele();
        $this->maVue = new $nomVue();


    }

    function affichageProfil () {

        $this->maVue->affichageProfil();
    }
}

?>
