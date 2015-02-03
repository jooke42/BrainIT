<?php

class ControleurCommande {

    private $maVue;
    private $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;
        $idCommande=ModeleCommande::getLastIdCommande($_SESSION['idClient']);
        $this->monModele = new $nomModele($idCommande);
        $this->maVue = new $nomVue();

    }


    function afficherCommande () {
        $req = $this->monModele->afficherCommande();
        $this->maVue->afficherCommande($req);
    }

    function envoieMontantTotal($idCommande){
        //$montant=$this->monModele->getMontantChaqueArticle();
        $montant=ModeleCommande::getMontantChaqueArticle($idCommande);
        $somme =0;
        foreach($articles as $article){
	      $somme+=$article['montantArticle'];
        }
        return $somme;
    }

    function creationCommande(){
        ModeleCommande::creationCommande($_SESSION['idClient']);
	//$idCommande =ModeleCommande::createCommande($_SESSION['idClient']);
      //  $somme=self::envoieMontantTotal($idCommande);
        //header("Location: http://amfbank.esy.es/METHODOPROJET/local_AMF/index.php?module=APIPaiement&action=afficherPopup&id=$idCommande&montant=$somme&nom=BRAINIT");

    }

}
