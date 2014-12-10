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
		if(strlen ( $query) >3 ){
			$req=self::$database->prepare("SELECT idArticle , c.libelle as categorie FROM article a JOIN categorie c ON a.idcategorie = c.idcategorie WHERE MATCH (a.reference,a.libelle,a.description) AGAINST ('+$query*'in boolean mode) OR MATCH(c.libelle) AGAINST ('+$query*'in boolean mode)");
		}else{
			?> 
			
			<div id="close" class="alert alert-dismissable alert-warning">
    <button type="button"  class="close" data-dismiss="alert">×</button>
    <h4>Attention</h4>
    <p>La recherche que vous avez effectué ne contient pas assez de caractère , les resultats ne seront peut être pas pertinent.</p>
</div>
			
			
			<?php
			$req=self::$database->prepare("SELECT idArticle , c.libelle as categorie FROM article a JOIN categorie c ON a.idcategorie = c.idcategorie WHERE  a.reference LIKE '%$query%' OR a.libelle LIKE '%$query%' OR a.description LIKE '%$query%' OR c.libelle LIKE '%$query%'");
		}
		
		$req->execute();
		$resultat=$req->fetchall();
		$listeArticle=array();
		foreach ($resultat as $article){
			array_push($listeArticle, new ModeleArticle($article['idArticle']));
		}
	
		return $listeArticle;
	}
}
