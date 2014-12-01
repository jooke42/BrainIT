<?php
class VueHomePage {
	function __construct(){
		
	}
	function afficherHomePage($listeTopArticle){
		$this->afficherCarousel();
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
			
		?></div><?php
	}
	function afficherCarousel(){
		?>
		<!-- *****************************CAROUSEL****************************** -->

	

	

		<div class="row">
			<div id="my_carousel" class="col-lg-12 carousel slide  "
				data-ride="carousel">
				<!-- Bulles -->
				<ol class="carousel-indicators">
					<li data-target="#my_carousel" data-slide-to="0" class="active"></li>
					<li data-target="#my_carousel" data-slide-to="1"></li>
					<li data-target="#my_carousel" data-slide-to="2"></li>
				</ol>

				<!-- Slides -->
				<div class="carousel-inner">
					<!-- Page 1 -->
					<div class="item active">
						<div class="carousel-page">
							<img id="imgCarrousel" src="Assets/img/4.jpg"
								class="img-responsive" />
						</div>
						<div class="carousel-caption">Bienvenue sur BrainIT !</div>
					</div>
					<!-- Page 2 -->
					<div class="item">
						<div class="carousel-page">
							<img id="imgCarrousel" src="Assets/img/2.jpg"
								class="img-responsive img-rounded" />
						</div>
						<div class="carousel-caption">Page 2 de présentation</div>
					</div>
					<!-- Page 3 -->
					<div class="item">
						<div class="carousel-page">
							<img id="imgCarrousel" src="Assets/img/3.jpg"
								class="img-responsive img-rounded" />
						</div>
						<div class="carousel-caption">Page 3 de présentation</div>
					</div>
				</div>
				<!-- Contrôles -->
				<a class="left carousel-control" href="#my_carousel"
					data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
				</a> <a class="right carousel-control" href="#my_carousel"
					data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>


		<!-- *************************FIN*CAROUSEL****************************** -->
		
		
		<?php
		
	}
}