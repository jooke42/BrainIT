<?php

class ControleurArticle{
	protected $maVue;
	protected $monModele;
	function __construct($module) {
		if(htmlspecialchars($_GET['idArticle'])!=NULL) {
            $idArticle=htmlspecialchars($_GET['idArticle']);

        }

        //$idArticle=1;

		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;
	
		$this->maVue=new $nomVue();	
	
		$this->monModele=new $nomModele($idArticle);	
		
		
	} 
	function affichagePageActiverDesactiverArticle(){
		$this->maVue->affichagePageActiverDesactiverArticle();
	}
    function activerArticle(){
		$this->monModele->activerArticle();
		$this->maVue->redirection();
    }
	function desactiverArticle(){
		$this->monModele->activerArticle();
		$this->maVue->redirection();
	}
	function creerArticle(){
        $article = array (
                'idArticle'     => NULL,
                'reference'     => htmlspecialchars($_GET['idArticle']),
                'marque'        => htmlspecialchars($_GET['marque']),
                'libelle'       => htmlspecialchars($_GET['libelle']),
                'description'   => htmlspecialchars($_GET['description']),
                'idCategorie'   => htmlspecialchars($_GET['idCategorie']),
                'prix'          => htmlspecialchars($_GET['prix']),
                'quantiteStock' => htmlspecialchars($_GET['quantiteStock']),
                'actif'         => 1
        );
        createArticle($article);
		$this->maVue->redirection();
	}
     function modifierArticle(){
        $article = array (
                'idArticle'     => NULL,
                'reference'     => htmlspecialchars($_GET['idArticle']),
                'marque'        => htmlspecialchars($_GET['marque']),
                'libelle'       => htmlspecialchars($_GET['libelle']),
                'description'   => htmlspecialchars($_GET['description']),
                'idCategorie'   => htmlspecialchars($_GET['idCategorie']),
                'prix'          => htmlspecialchars($_GET['prix']),
                'quantiteStock' => htmlspecialchars($_GET['quantiteStock'])
        );
        $this->monModele->modifierArticle($article);
		$this->maVue->redirection();
     }
     function modifierArticleSelection(){
		$this->maVue->modifierArticleSelection();
     }
     function AffichageCreerArticle(){
		$this->maVue->affichageCreerProduit();
	}
     function affichageModifierArticle(){
		$information =$this->monModele->getArticle();
		$this->maVue->affichageModifierProduit($information);
     }
	function affichagePageArticle() {
	
		$information =$this->monModele->getArticle();
		$this->maVue->affichagePageProduit($information);
	}	
	function connexion($email,$pass) {
		$this->monModele->connexion($email,$pass);
		
	}
}

?>
