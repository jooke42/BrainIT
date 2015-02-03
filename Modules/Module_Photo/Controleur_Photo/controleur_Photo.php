<?php

class ControleurPhoto {
	public $maVue;
	public $monModele;
	function __construct($module) {

		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;

		$this->monModele=new $nomModele();		
		$this->maVue=new $nomVue();	

	}
	function affichageFormPhoto($idArticle) {
		$this->maVue->affichageFormPhoto($idArticle);
	}
	function uploadPhoto($idArticle,$index,$destination,$maxsize,$extensions) {
		
		$idPhoto=$this->monModele->uploadPhoto($idArticle,$index,$destination,$maxsize,$extensions);
        return $idPhoto;
	}

	function affichagePhotoReq() {
		$req=$this->monModele->affichagePhotoReq();
		return $req;
	}
	function affichagePhotoArticleReq() {
		$req=$this->monModele->affichagePhotoArticleReq();
		return $req;
	}

	
	function affichagePhotoArticle($req) {
		$this->maVue->affichagePhotoArticle($req);
	}
	function affichagePhotoArticleComplet() {
   		$req=$this->affichagePhotoArticleReq();
		$this->affichagePhotoProfil($req);
	}
	function setPhotoPrincipale($destination,$idArticle) {
		$this->monModele->setPhotoPrincipale($destination,$idArticle);
		header("Refresh: 0;URL='index.php?Module=Article&idArticle=$idArticle'");
	}

}

?>
