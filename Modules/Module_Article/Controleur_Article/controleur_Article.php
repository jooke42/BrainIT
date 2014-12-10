<?php

class ControleurArticle{
	private $maVue;
	private $monModele;
	function __construct($module) {
		/*if(isset(htmlspecialchars($_GET['idArticle']))) {
            $idArticle=htmlspecialchars($_GET['idArticle']);

        }*/
        $idArticle=1;
        echo "testJenAiMArre";
		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;
		echo $nomModele."     ".$idArticle;
		$this->maVue=new $nomVue();	
	
		$this->monModele=new $nomModele($idArticle);	
		echo"test controleur Ok ?1";			
		
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
