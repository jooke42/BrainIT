<?php 

if (! defined ('TEST_INCLUDE'))
   die ("Vous ne pouvez pas acceder directement Ã  ce fichier");



include_once("Controleur_".$module."/controleur_".$module.".php");
include_once("Vue_".$module."/vue_".$module.".php");
include_once("Modele_".$module."/modele_".$module.".php");

class Inscription extends Module {
	
	function __construct() {
		
		$module=get_class($this);
		$nomControleur='Controleur'.$module;
		$monControleur=new $nomControleur($module);
		
		
		if(isset($_POST['nom'])) {
			$nom=$_POST['nom'];
			$pass=$_POST['pass'];
			$email=$_POST['email'];
			$genre=$_POST['genre'];
			$prenom=$_POST['prenom'];
			$datNais=$_POST['datNais'];
			$passConf=$_POST['passConf'];
			$telephone=$_POST['telephone'];
	
	
		}

		if(!isset($action)) {
			if(isset($_GET['action'])) {
				$action=$_GET['action'];
			}
			else {
				$action=0;
			}
		}


		switch($action) {
			case 0:
				
				$monControleur->affichageFormInscription();
			break;

			case 1:
		
				$monControleur->nouveauUser($nom, $prenom, $genre, $pass, $passConf,$email ,$datNais, $telephone);
			break;

			case 3:
				echo "/!\ Mot de passes non identiques /!\ ";
				ControleurInscription::affichageFormInscription();
			break;

			case 4:
				echo  "/!\ Adresse mail déjà  utilisée /!\ ";
				ControleurInscription::affichageFormInscription();
			break;
			default:
				ControleurInscription::affichageFormInscription();
			break;
		}
	}
}
?>

