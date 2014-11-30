<?php
if (!defined('TEST_INCLUDE'))
    die ("Vous n'avez pas accès directement à ce fichier");

class ModeleArticle extends DBMapper
{

    protected $_id_article;
	protected $_reference;
	protected $_libelle;
	protected $_description;
	protected $_id_categorie;
	protected $_prix;
	protected $_quantiteStock;



    function __construct($id_article)
    {
        //ICI on récupère les informations de l'article
        $requete = "SELECT DISTINCT * FROM Article WHERE idArticle = :id_article";
        try {
            $reponse = self::$database->prepare($requete);
            $reponse->execute(
                array(
                    'id_article' => $id_article
                ));
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
        ;

        $articleDonnees = $reponse->fetch();
	print_r($articleDonnees);
        if ($articleDonnees == NULL) {
            throw new Exception("L'identifiant d'article :" . $id_article . " n'existe pas.");
        }
        echo "oklm";
        
        $this->_id_article = $articleDonnees['idArticle'];
        $this->_reference        = $articleDonnees['reference'];
        $this->_libelle     = $articleDonnees['libelle'];
        $this->_description    = $articleDonnees['description'];
		$this->_id_categorie = $articleDonnees['idCategorie'];
        $this->_prix        = $articleDonnees['prix'];
        $this->_quantiteStock     = $articleDonnees['quantiteStock'];
    }

   
    static function createArticle($donneesArticle) 
    {
	if(!isset($donneesArticle['reference'])){
		throw new Exception("Reference non spécifié");
	}
	if(!isset($donneesArticle['libelle'])){
		throw new Exception("libelle non spécifié");
	}
	if(!isset($donneesArticle['description'])){
		throw new Exception("description non spécifié");
	}
	if(!isset($donneesArticle['idCategorie'])){
		throw new Exception("idCategorie non spécifié");
	}
	if(!isset($donneesArticle['prix'])){
		throw new Exception("prix non spécifié");
	}
	if(!isset($donneesArticle['quantiteStock'])){
		throw new Exception("quantiteStock non spécifié");
	}
        //ICI on créer l'article dans la base de donnée
        $requete = "INSERT INTO article (reference, libelle, description, idCategorie, prix, quantiteStock) VALUES(:reference, :libelle, :description, :idCategorie, :prix, :quantiteStock)";
        try {
            $reponse = self::$database->prepare($requete);
            $reponse->execute($donneesArticle);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }

        // On créer l'objet article
        //return new Article($donneesArticle['id_article']);
    }

	
    /** Retourne l'identifiant de l'article
     * @return integer : Identifiant article
     */
    function getIdArticle()
    {
        return $this->_id_article;
    }


	function getArticle(){
	return $article=array(
	'id_article' => $this->_id_article,
        'reference' => $this->_reference,
        'libelle' => $this->_libelle,
        'description' => $this->_description,
	'id_categorie' => $this->_id_categorie,
        'prix' => $this->_prix,
        'quantiteStock' => $this->_quantiteStock);
	}
}
