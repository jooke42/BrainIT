<?php

class VueArticle{

	function affichagePageProduit($produit,$controleurPhoto,$photo) {
		/*
		echo 'photo profil ' . $produit['idPhoto'].'<br>';	
		foreach ($photo as $unePhoto ){
			if($unePhoto[0] == $produit['idPhoto']) {
				echo '<img src='.$unePhoto[4].' />';
			}
		}
		reset($photo);
		echo '<h1>'.$produit['libelle'].'</h1><input type="button" onclick="document.location.href=\'index.php?Module=Panier&action=1&idArticle='.$produit['idArticle'].'\'"value="Ajouter au panier"></br>';
		echo 'prix :'.$produit['prix'].'</br>';
		echo 'description :'.$produit['description'].'</br>';
		echo 'id photo : '.$produit['idPhoto'].'</br>';
		if(isset($_SESSION['idAdmin'])) {
			$controleurPhoto->affichageFormPhoto($produit['idArticle']);
		}
	
		foreach ($photo as $unePhoto ){
			echo "unephoto <br>";
		}
			'id_article' => $this->_id_article,
        'reference' => $this->_reference,
        'libelle' => $this->_libelle,
        'description' => $this->_description,
	'id_categorie' => $this->_id_categorie,
        'prix' => $this->_prix,
        'quantiteStock' => $this->_quantiteStock);*/
		
		if(isset($_SESSION['idAdmin'])) {
			$controleurPhoto->affichageFormPhoto($produit['idArticle']);
		}
				echo '<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								';
				echo '<img src="'.$produit["Photo"].'" alt="unphoto" />';
				echo '<h3>Zoom</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->';
							echo '<div class="carousel-inner">';
							echo '<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
								<!-- The container for the modal slides -->
								<div class="slides"></div>
								<!-- Controls for the borderless lightbox -->
								<h3 class="title"></h3>
								<a class="prev">‹</a>
								<a class="next">›</a>
								<a class="close">×</a>
								<a class="play-pause"></a>
								<ol class="indicator"></ol>
								<!-- The modal dialog, which will be used to wrap the lightbox content -->
								<div class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" aria-hidden="true">&times;</button>
												<h4 class="modal-title"></h4>
											</div>
											<div class="modal-body next"></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left prev">
													<i class="glyphicon glyphicon-chevron-left"></i>
													Previous
												</button>
												<button type="button" class="btn btn-primary next">
													Next
													<i class="glyphicon glyphicon-chevron-right"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>';
							echo '<div id="links">';
							foreach ($photo as $unePhoto ) {
									echo '<a href="'.$unePhoto[4].'" data-gallery><img src="';
									echo $unePhoto[4];
									echo '" alt="unePhoto" width="20%" height="20%"></a>';
							}
								echo '</div>';	
							
								
									
									
								
							
						
							echo '</div>';
								   

								  echo '<!-- Controls -->
								  
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="Assets/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>';
								echo $produit['libelle'];
								echo '</h2>';
								echo '<p>';
								echo $produit['reference'];
								echo '</p>';
								echo '<img src="Assets/images/product-details/rating.png" alt="" />
								<span>
									<span>';
								echo $produit['prix'];
								echo '€</span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart" onclick="document.location.href=\'index.php?Module=Panier&action=1&idArticle='.$produit['idArticle'].'\'">
										<i class="fa fa-shopping-cart"></i>
										Ajouter au panier
									</button>
								</span>
								<p><b>Availability:</b> En stock (';
								echo $produit['quantiteStock'].' restant)';
								echo'</p>';
								echo 'Description : ';

								echo substr($produit['description'],0, 400);
								echo '<a id="lirelaSuite" onclick=getdesc() >Lire la suite ...</a>';
								
								echo '<a href=""><img src="Assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><script>function getDesc()
						  {
						  var x=document.getElementById("lirelaSuite");
							x.innerHtml()
						 
						  }</script>';
	}

	function affichagePageActiverDesactiverArticle(){
		echo '

<form method="get" action="index.php">
   	<p>
    <input type="hidden" value="Article" name="Module" />
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
		header('Location: index.php');  
	}
	function AffichageCreerArticle(){
		echo '
		<form method="get" action="index.php">
   		<p>
              <input type="hidden" value="creerArticle" name="action" />
        <input type="hidden" value="Article" name="Module" />
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

    	   <input type="submit" value="Envoyer" />
	   </p>
	</form>
            ';
          }
          	function AffichageModifierArticle($produit,$idArticle){
		echo '
		<form method="get" action="index.php">
   		<p>
        <input type="hidden" value="modifierArticle" name="action" />
        <input type="hidden" value="Article" name="Module" />
        <input type="hidden" value="'.$idArticle.'" name="idArticle" />
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

    	   <input type="submit" value="Envoyer" />
	   </p>
	</form>
            ';
          }
          function AffichagemodifierArticleSelection(){
    echo '
    <form method="get" action="index.php">
      <p>
                    <input type="hidden" value="affichageModifierArticle" name="action" />
        <input type="hidden" value="Article" name="Module" />
      <label for="idArticle">id Article</label>
        <input type="text" name="idArticle" id="idArticle"  />

         <input type="submit" value="Modifier" />
     </p>
  </form>
            ';

          }

}

?>
