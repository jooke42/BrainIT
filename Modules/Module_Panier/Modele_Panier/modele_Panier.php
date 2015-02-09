<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class ModelePanier extends DBMapper {

	function __construct() {}

	function ajoutPanier($idArticle, $quantite) {

        $idClient = $_SESSION['idClient'];
		$req_select = self::$database->prepare("select idArticle from panier where idArticle=$idArticle and idClient=$idClient");
		$req_select->execute();

		$req=$req_select->fetch();
		$req=$req[0];
		if($req == null) {
			
			$req = self::$database->prepare("insert into panier (idClient,idArticle,quantite) VALUES ('$idClient','$idArticle','$quantite')");  
			$req->execute();
			
		} else {

			$this->modifierArticlePanier($idArticle, $quantite);
			
		}

		/* AJOUT + MODIF EN MEME TEMPS */

		/*$requete = self::$database->prepare("INSERT into panier(idClient,idArticle,quantite) VALUES (?, ?, ?) 
											ON duplicate key 
											UPDATE quantite=?;");

		$requete->execute(array($idClient, $idArticle, $quantite, $quantite));*/

    }

	function modifierArticlePanier($idArticle, $quantite) {

		$idClient = $_SESSION['idClient'];
        $req = self::$database->prepare("update panier set quantite='$quantite' where idClient='$idClient' and idArticle='$idArticle'");
        $req->execute();

	}

	function modifierQuantiteEnDirect() {

		$idClient = $_SESSION['idClient'];
		// TODO

	}

	function supprimerArticlePanier($idArticle) {

		$idClient = $_SESSION['idClient'];
        $req = self::$database->prepare("delete from panier where idArticle='$idArticle'");
        $req->execute();
		header("Refresh: 0;URL='index.php?Module=Panier'");
	}

	function afficherPanier() {
		$idClient = $_SESSION['idClient'];
		$req = static::$database->prepare("select article.idArticle,quantite from panier, article where idClient='$idClient' and panier.idArticle=article.idArticle");
		$req->execute();
		$resultat = $req->fetchall();

        $articles=array();


		foreach($resultat as $article){
			$art=new ModeleArticle($article['idArticle']);
			$art=$art->getArticle();
			$art['quantite']=$article['quantite'];
			array_push($articles,$art);
		}


		return $articles;

	}

}

?>
