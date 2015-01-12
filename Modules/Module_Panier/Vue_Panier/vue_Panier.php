<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class VuePanier {

	function __construct() {}

    function afficherPanier($req) {
		
		echo "<strong>Panier du client : </strong>" . $_SESSION['idClient'];
		echo "<br /><br />";

		while($resultat = $req->fetch()) {
			echo $resultat['idArticle'] . " : " . $resultat['libelle'];
			echo '<br />';
		}

		if(isset($_SESSION['idAdmin'])) {

		echo '<form action="index.php?Module=Panier&action=1&idArticle=2&quantite=5" method="get" enctype="multipart/form-data">';
			echo '<button type="submit">Ajouter article</button>';
		echo '</form>';
		
		echo '<form action="index.php?Module=Panier&action=2&idArticle=2&quantite=10" method="get">';
			echo "<button type='submit' value=''>Modifier article</button>";
		echo '</form>';

		echo "<form action='index.php?Module=Panier&action=3&idArticle=2' method='get'>";
			echo "<button type='submit' value=''>Supprimer article</button>";
		echo "</form>";

		}

    }
}
?>
