<?php

class ModeleHomePage extends DBMapper {
	protected $_listeTopArticleParCategorie=array();
	protected $_listeCategorie= array();
	
	function  __construct(){
		$req=self::$database->prepare("select idCategorie,libelle from categorie ");
		$req->execute();
		$this->_listeCategorie=$req->fetchall();
		foreach ($this->_listeCategorie as $categorie) {
			$this->_listeTopArticleParCategorie[$categorie['libelle']]=array();
			$idCat=$categorie['idCategorie'];
			$req=self::$database->prepare("select  idArticle from article where idCategorie=$idCat LIMIT 3 ");
			$req->execute();
			$resultat=$req->fetchall();
			
			
			foreach ($resultat as $article) {
				array_push($this->_listeTopArticleParCategorie[$categorie['libelle']],new ModeleArticle($article['idArticle']));
			}

		}
		
		
	}
	function getListeTopArticle(){
		return $this->_listeTopArticleParCategorie;
	}

	
}

?>
