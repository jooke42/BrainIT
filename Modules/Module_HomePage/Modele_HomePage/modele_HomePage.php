<?php

class ModeleConnexion extends DBMapper {
	protected $_listeTopArticle=array();
	protected $_listeCategory= array();
	
	function  __construct(){
		$req=self::$database->prepare("select id from categorie ");
		$req->execute();
		$resultat=$req->fetchall();
		foreach ($resultat as $category) {
			array_push($this->_listeCategory, $article);
		}
		
		
	}

	
}

?>
