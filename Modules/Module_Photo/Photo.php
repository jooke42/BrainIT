<?php

if (! defined ('TEST_INCLUDE'))
	die ("Vous ne pouvez pas acceder directement à ce fichier");


class Photo extends Module {
	public $monControleur;
	function __construct() {

		$module=get_class($this);

		include_once("Controleur_".$module."/controleur_".$module.".php");
		include_once("Vue_".$module."/vue_".$module.".php");
		include_once("Modele_".$module."/modele_".$module.".php");

		$nomControleur='Controleur'.$module;
		$monControleur=new $nomControleur($module);

		if(!isset($actionPhoto)) {
			if(isset($_GET['actionPhoto'])) {
				$actionPhoto=$_GET['actionPhoto'];
			}
			else {
				$actionPhoto=0;
			}
		}


		if(isset($_POST['MAX_FILE_SIZE'])) {

			$maxsize=$_POST['MAX_FILE_SIZE'];

		}
		else {
			$titre=null;
			$description=null;
			$maxsize=null;
		}
		if(isset($_GET['idArticle'])) {
			$idArticle=$_GET['idArticle'];
		}
		else {
			$idArticle=NULL;
		}
		if(isset($_FILES['photo'])) {
			$destination='Assets/photo/'.$_FILES['photo']['name'];
		}
		else {
			$destination=NULL;
		}
		switch($actionPhoto) {
			case 0:
				$monControleur->affichagePhotoArticle($idArticle);
			case 1:
				if(isset($_POST['profil'])) {

					$idPhoto=$monControleur->uploadPhoto($idArticle,'photo',$destination,$maxsize,array('png','gif','jpg','jpeg'));

					$monControleur->setPhotoPrincipale($destination,$idArticle);
				}
				else {
					$monControleur->uploadPhoto($idArticle,'photo',$destination,$maxsize,array('png','gif','jpg','jpeg'));
				}

				break;

			case 2:
				$monControleur->affichagePhotoArticleComplet();
				break;

			default:

			case 3:
				$monControleur->affichageFormPhoto();
				break;


				break;

		}
	}
}


?>


