<?php

class VueArticle{

	function affichagePageProduit($produit) {
	
		echo '<h1>'.$produit['libelle'].'</h1><input type="button" onclick="document.location.href=\'index.php?Module=Panier&action=1&idArticle='.$produit['idArticle'].'\'">;" value="Ajouter au panier"></br>';
		echo 'prix :'.$produit['prix'].'</br>';
		echo 'description :'.$produit['description'].'</br>';
			/*	'id_article' => $this->_id_article,
        'reference' => $this->_reference,
        'libelle' => $this->_libelle,
        'description' => $this->_description,
	'id_categorie' => $this->_id_categorie,
        'prix' => $this->_prix,
        'quantiteStock' => $this->_quantiteStock);*/
		
		
	}
	function affichagePageActiverDesactiverArticle(){
		echo '

<form method="get" action="index.php">
   	<p>
   		<label for="idArticle">id de l\'article ?</label>
       <input type="text" name="idArticle" id="idArticle" />
    	   <label for="pays">Etat ?</label><br />
    	   <select name="action" id="action">
    	       <option value="activerArticle">activer</option>
    	       <option value="desactiverArticle">desactiver</option>
    	   </select>
    	   <input type="submit" value="Envoyer" />
	   </p>
	</form>

		';
	}
	function redirection(){
		echo "header('Location: index.php');  ";
	}
	function AffichageCreerArticle(){
		echo '
		<form method="get" action="index.php">
   		<p>
   		<label for="reference">reference</label>
       	<input type="text" name="reference" id="reference" />
   		<label for="libelle">libelle</label>
       	<input type="text" name="libelle" id="libelle" />
       	<label for="marque">marque</label>
       	<input type="text" name="marque" id="marque" />
       	<label for="idArticle">description</label>
       	<input type="text" name="description" id="description" />
       	<label for="idArticle">idCategorie</label>
       	<input type="text" name="idCategorie" id="idCategorie" />
       	<label for="idArticle">prix</label>
       	<input type="text" name="prix" id="prix" />
       	<label for="idArticle">quantiteStock</label>
       	<input type="text" name="quantiteStock" id="quantiteStock" />
       	<input type="hidden" value="creerArticle" name="action" />
    	   <input type="submit" value="Envoyer" />
	   </p>
	</form>
            ';
          }
          	function AffichageModifierArticle($produit){
		echo '
		<form method="get" action="index.php">
   		<p>
   		<label for="reference">reference</label>
       	<input type="text" name="reference" id="reference" value='.$produit['reference'].' />
   		<label for="libelle">libelle</label>
       	<input type="text" name="libelle" id="libelle"  value='.$produit['libelle'].'/>
       	<label for="marque">marque</label>
       	<input type="text" name="marque" id="marque"  value='.$produit['marque'].'/>
       	<label for="idArticle">description</label>
       	<input type="text" name="description" id="description" value='.$produit['description'].' />
       	<label for="idArticle">idCategorie</label>
       	<input type="text" name="idCategorie" id="idCategorie"  value='.$produit['idCategorie'].'/>
       	<label for="idArticle">prix</label>
       	<input type="text" name="prix" id="prix" value='.$produit['prix'].' />
       	<label for="idArticle">quantiteStock</label>
       	<input type="text" name="quantiteStock" id="quantiteStock"  value='.$produit['quantiteStock'].'/>
       	<input type="hidden" value="creerArticle" name="action" />
    	   <input type="submit" value="Envoyer" />
	   </p>
	</form>
            ';
          }
          function AffichagemodifierArticleSelection(){
    echo '
    <form method="get" action="index.php">
      <p>
      <label for="reference">id Article</label>
        <input type="text" name="reference" id="reference"  />
        <input type="hidden" value="modifierArticle" name="action" />
         <input type="submit" value="Modifier" />
     </p>
  </form>
            ';

          }

}

?>
