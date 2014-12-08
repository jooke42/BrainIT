<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class ModelePanier extends DBMapper {

	function ajoutPanier($idArticle, $quantite) {
        $idClient=$_SESSION['idClient'];
        //var_dump($idClient,$idArticle,$quantite);
        $req=self::$database->prepare("insert into panier (idClient,idArticle,quantite) VALUES ('$idClient','$idArticle','$quantite')");
        $req->execute();
    }

	function modifierArticlePanier($idArticle, $quantite) {
		$idClient=$_SESSION['idClient'];
        //var_dump($idClient,$idArticle,$quantite);
        $req=self::$database->prepare("update panier set quantite='$quantite' where idClient='$idClient' and idArticle='$idArticle'");
        $req->execute();
	}

	function supprimerArticlePanier($idArticle) {
		$idClient=$_SESSION['idClient'];
        //var_dump($idClient,$idArticle);
        $req=self::$database->prepare("delete from panier where idArticle='$idArticle'");
        $req->execute();
	}

	function afficherPanier() {
		$idClient=$_SESSION['idClient'];
        var_dump($idClient);
        $req=self::$database->prepare("select * from panier, article where idClient='$idClient' and panier.idArticle=article.idArticle");
        $req->execute();

		return $req;
	}

}

?>
