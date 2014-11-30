<?php

class ControleurArticle {
	private $maVue;
	private $monModele;
	function __construct($module) {

		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;

		$this->monModele=new $nomModele();		
		$this->maVue=new $nomVue();
		
		
	}
	function affichagePageArticle() {
		$information = $this->$monModele->getArticle();
		$this->maVue->affichagePageProduit($information);
	}	
	function connexion($email,$pass) {
		$this->monModele->connexion($email,$pass);
		
	}
}

?>
