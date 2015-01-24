<?php
class VueHomePage {
	function __construct(){
		
	}
	function afficherHomePage($listeTopArticle){
		$this->afficherCarousel();
		?><div class="col-sm-9 padding-right">
		<div class="features_items">
			<h2 class="title text-center">Nouveaux articles</h2><?php

		$compteur=0;

		foreach ($listeTopArticle as $categorie => $ListeArticle) {
			/*if ($compteur%3==0 && $compteur!=0){
				echo '</div>';
			}
			if ($compteur%3==0){
				echo '<div class="row">';
			}*/
			?> <div class="col-sm-4">
						<?php foreach ($ListeArticle as $article ){
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
			
		?></div>
		</div>
	<?php
	}
	function afficherCarousel(){
		?>
		<!-- *****************************CAROUSEL****************************** -->





		<section id="slider"><!--slider-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li>
							</ol>

							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-6">
										<h1><span>Brain</span>-IT</h1>
										<h2>Description du produit</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<button type="button" class="btn btn-default get">Accéder au détail</button>
									</div>
									<div class="col-sm-6">
										<img src="Assets/images/home/caroussel-1.jpg" class="girl img-responsive" alt="" />
										<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
									</div>
								</div>
								<div class="item">
									<div class="col-sm-6">
										<h1><span>Brain</span>-IT</h1>
										<h2>Description du produit</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<button type="button" class="btn btn-default get">Accéder au détail</button>
									</div>
									<div class="col-sm-6">
										<img src="Assets/images/home/caroussel-2.jpg" class="girl img-responsive" alt="" />
										<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
									</div>
								</div>

								<div class="item">
									<div class="col-sm-6">
										<h1><span>Brain</span>-IT</h1>
										<h2>Description du produit</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<button type="button" class="btn btn-default get">Accéder au détail</button>
									</div>
									<div class="col-sm-6">
										<img src="Assets/images/home/caroussel-3.jpg" class="girl img-responsive" alt="" />
										<!--<img src="images/home/pricing.png" class="pricing" alt="" />-->
									</div>
								</div>

							</div>

							<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>

					</div>
				</div>
			</div>
		</section><!--/slider-->
		
		
		<?php
		
	}
}