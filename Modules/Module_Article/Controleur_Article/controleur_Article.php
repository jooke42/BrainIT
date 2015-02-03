<<<<<<< HEAD
<?php

class ControleurArticle{
	protected $maVue;
	protected $monModele;
	function __construct($module) {


        //$idArticle=1;

		$nomVue='Vue'.$module;
		$nomModele='Modele'.$module;
	
		$this->maVue=new $nomVue();	
		if(isset($_GET['idArticle'])) {
            $idArticle=htmlspecialchars($_GET['idArticle']);
            $this->monModele=new $nomModele($idArticle);	

        }
		
		
		
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
                'reference'     => htmlspecialchars($_GET['reference']),
                'marque'        => htmlspecialchars($_GET['marque']),
                'libelle'       => htmlspecialchars($_GET['libelle']),
                'description'   => htmlspecialchars($_GET['description']),
                'idCategorie'   => htmlspecialchars($_GET['idCategorie']),
                'prix'          => htmlspecialchars($_GET['prix']),
                'quantiteStock' => htmlspecialchars($_GET['quantiteStock']),
                'actif'         => FALSE
        );
        ModeleArticle::createArticle($article);
		$this->maVue->redirection();
	}
     function modifierArticle(){
        $article = array (
                'idArticle'     => htmlspecialchars($_GET['idArticle']),
                'reference'     => htmlspecialchars($_GET['reference']),
                'marque'        => htmlspecialchars($_GET['marque']),
                'libelle'       => htmlspecialchars($_GET['libelle']),
                'description'   => htmlspecialchars($_GET['description']),
                'idCategorie'   => htmlspecialchars($_GET['idCategorie']),
                'prix'          => htmlspecialchars($_GET['prix']),
                'quantiteStock' => htmlspecialchars($_GET['quantiteStock']),
                'actif'         => TRUE
        );
        $this->monModele->modifierArticle($article);
		$this->maVue->redirection();
     }
     function modifierArticleSelection(){
		$this->maVue->AffichagemodifierArticleSelection();
     }
     function AffichageCreerArticle(){
		$this->maVue->AffichageCreerArticle();
	}
     function affichageModifierArticle(){
		$information =$this->monModele->getArticle();
		$this->maVue->AffichageModifierArticle($information,htmlspecialchars($_GET['idArticle']));
     }
	function affichagePageArticle($controleurPhoto) {
		
		$information =$this->monModele->getArticle();
		$photo = $this->monModele->getPhoto($information);
		$this->maVue->affichagePageProduit($information,$controleurPhoto,$photo);

	}	

}

?>
=======
<?php

class ControleurArticle {
    protected $maVue;
    protected $monModele;

    function __construct ($module) {

        $nomVue = 'Vue' . $module;
        $nomModele = 'Modele' . $module;

        $this->maVue = new $nomVue();
        if (isset($_GET['idArticle'])) {
            $idArticle = htmlspecialchars($_GET['idArticle']);
            $this->monModele = new $nomModele($idArticle);

        }


    }

    function affichagePageActiverDesactiverArticle () {
        $this->maVue->affichagePageActiverDesactiverArticle();
    }

    function activerArticle () {
        $this->monModele->activerArticle();
        $this->maVue->redirection();
    }

    function desactiverArticle () {
        $this->monModele->activerArticle();
        $this->maVue->redirection();
    }

    function creerArticle () {
        $article = array(
            'reference' => htmlspecialchars($_GET['reference']),
            'marque' => htmlspecialchars($_GET['marque']),
            'libelle' => htmlspecialchars($_GET['libelle']),
            'description' => htmlspecialchars($_GET['description']),
            'idCategorie' => htmlspecialchars($_GET['idCategorie']),
            'prix' => htmlspecialchars($_GET['prix']),
            'quantiteStock' => htmlspecialchars($_GET['quantiteStock']),
            'actif' => FALSE
        );
        ModeleArticle::createArticle($article);
        $this->maVue->redirection();
    }

    function modifierArticle () {
        $article = array(
            'idArticle' => htmlspecialchars($_GET['idArticle']),
            'reference' => htmlspecialchars($_GET['reference']),
            'marque' => htmlspecialchars($_GET['marque']),
            'libelle' => htmlspecialchars($_GET['libelle']),
            'description' => htmlspecialchars($_GET['description']),
            'idCategorie' => htmlspecialchars($_GET['idCategorie']),
            'prix' => htmlspecialchars($_GET['prix']),
            'quantiteStock' => htmlspecialchars($_GET['quantiteStock']),
            'actif' => TRUE
        );
        $this->monModele->modifierArticle($article);
        $this->maVue->redirection();
    }

    function modifierArticleSelection () {
        $this->maVue->AffichagemodifierArticleSelection();
    }

    function AffichageCreerArticle () {
        $this->maVue->AffichageCreerArticle();
    }

    function affichageModifierArticle () {
        $information = $this->monModele->getArticle();
        $this->maVue->AffichageModifierArticle($information, htmlspecialchars($_GET['idArticle']));
    }

    function affichagePageArticle () {

        $information = $this->monModele->getArticle();
        $this->maVue->affichagePageProduit($information);
    }

}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
