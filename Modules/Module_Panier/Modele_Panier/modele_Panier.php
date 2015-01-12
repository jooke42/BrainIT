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

		if($req_select->fetch()[0] == null) {
			
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

	function supprimerArticlePanier($idArticle) {

		$idClient = $_SESSION['idClient'];
        $req = self::$database->prepare("delete from panier where idArticle='$idArticle'");

		$req->execute();
		header("Refresh:0;URL='index.php?Module=Panier'");

	}

	function afficherPanier() {

		$idClient = $_SESSION['idClient'];
        $req = self::$database->prepare("select * from panier, article where idClient='$idClient' and panier.idArticle=article.idArticle");
        $req->execute();
		
		return $req;

	}
	function ConfirmerPanier() {

		$Paiement =curl_init();
		curl_setopt($Paiement,CURLOPT_URL,"localhost/BraintIT");
		curl_setopt($Paiement,CURLOPT_HEADER,0);
		$resultat=curl_exec($Paiement);
		var_dump($resultat);
		curl_close($Paiement);

		/*$idClient = $_SESSION['idClient'];
		$req = self::$database->prepare("select * from panier, article where idClient='$idClient' and panier.idArticle=article.idArticle");
		$req->execute();*/

		return $req;

	}

}

?>
