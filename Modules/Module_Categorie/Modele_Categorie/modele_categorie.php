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
	
	function searchArticle($query){
		$req=self::$database->prepare("SELECT idarticle , c.libelle as categorie
	FROM article a
	JOIN categorie c
	ON a.idcategorie = c.idcategorie
	WHERE MATCH (a.reference,a.libelle,a.description) AGAINST ('$query*'in boolean mode)
	OR MATCH(c.libelle) AGAINST ('$query*'in boolean mode)");
		$req->execute();
		$resultat=$req->fetchall();
		$listeArticle=array();
		foreach ($resultat as $article){
			array_push($listeArticle, array(article => new ModeleArticle($article['idArticle']),Categorie=>$article['categorie']));
		}
	
		return $listeArticle;
	}
}