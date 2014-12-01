<?php
class ModeleCategorie extends DBMapper{
	private $listeArticleCategorie;
	function __construct(){
		
		
	}
	function getListeArticle($Categorie,$order){
		$req=self::$database->prepare("SELECT idArticle FROM article join categorie on categorie.idCategorie=article.idCategorie where categorie.libelle='$Categorie' ORDER BY article.$order");
		
		$req->execute();
		$resultat=$req->fetchall();
		$listeArticle=array();
		foreach ($resultat as $article){
			array_push($listeArticle, new ModeleArticle($article['idArticle']));
		}
		
		return $listeArticle;
	}
}