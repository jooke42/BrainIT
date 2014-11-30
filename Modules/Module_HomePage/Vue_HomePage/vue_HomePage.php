<?php
class VueHomePage {
	function __construct(){
		
	}
	function afficherHomePage($listeTopArticle){
		?><div id="articleVitrine"><?php
		$compteur=0;
		foreach ($listeTopArticle as $categorie => $ListeArticle) {
			if ($compteur%3==0 && $compteur!=0){
				echo '</div>';
			}
			if ($compteur%3==0){
				echo '<div class="row">';
			}
			?> <div class="col-lg-4">
						<div class="panel panel-default ">
						<div class="panel-heading" style="text-align:center;"><?php echo $categorie;?></div>
						<div class="panel-body"><?php foreach ($ListeArticle as $article ){
							?><div class="well"><?php 
							
							
							$article=$article->getArticle();
							echo $article['libelle']."   ";
							echo $article['quantiteStock']."  ";
							echo $article['prix']."  ";
							echo'<br>';
							?></div><?php 
						}?></div>
						
						</div>
						</div><?php 
						
						$compteur++;
		}
			
		
		?>
		</div>
		<?php
	}
}