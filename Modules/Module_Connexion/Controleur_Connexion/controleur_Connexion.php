<?php

class ControleurConnexion {
	private $maVue;
	private $monModele;
	function __construct($module) {

		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;

		$this->monModele=new $nomModele();		
		$this->maVue=new $nomVue();
		
		
	}
	function affichageFormConnexion() {
		$this->maVue->affichageFormConnexion();
	}	
	function connexion($email,$pass) {
		$this->monModele->connexion($email,$pass);
		
	}
}

?>
