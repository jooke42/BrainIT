<<<<<<< HEAD
<?php

class VueHomePage {
    function __construct () {

    }

    function afficherHomePage ($listeTopArticle) {
        $this->afficherCarousel();

        ?>

		<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Catégories</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#carte_graphique">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cartes graphique
										</a>
									</h4>
								</div>
								<div id="carte_graphique" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Carte Graphique NVIDIA </a></li>
											<li><a href="#">Carte Graphique AMD </a></li>
											<li><a href="#">GeForce GTX </a></li>
											<li><a href="#">GeForce GT</a></li>
											<li><a href="#">Radeon HD </a></li>
											<li><a href="#">Radeon R7 </a></li>
											<li><a href="#">Radeon R9</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#carte_mere">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cartes mère
										</a>
									</h4>
								</div>
								<div id="carte_mere" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#processeur">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Processeur
										</a>
									</h4>
								</div>
								<div id="processeur" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#disque_dur">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Disques durs et SSD
										</a>
									</h4>
								</div>
								<div id="disque_dur" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#memoire">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Barrettes mémoire
										</a>
									</h4>
								</div>
								<div id="memoire" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#alim">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Alimentation PC
										</a>
									</h4>
								</div>
								<div id="alim" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#carte_son">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Audio et cartes son
										</a>
									</h4>
								</div>
								<div id="carton_son" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#graveur">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Graveurs et lecteurs
										</a>
									</h4>
								</div>
								<div id="graveur" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#cle_usb">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Clés USB
										</a>
									</h4>
								</div>
								<div id="cle_usb" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#connectique">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Connectique
										</a>
									</h4>
								</div>
								<div id="connectique" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items">
                		<h2 class="title text-center">Nouveaux articles</h2><?php



                foreach ($listeTopArticle as $categorie => $ListeArticle) {
                    foreach ($ListeArticle as $article) {
                        $article = $article->getArticle(); ?>

                        <div class="col-sm-4" style="height: 550px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo  $article['Photo']; ?>" alt="" width="100%" height="100%" />

                                        <h2><?php echo $article['prix'] . "  €" ?></h2>

                                        <p style="padding: 10px;"><?php echo $article['libelle']; ?></p>
                                        <a href="index.php?Module=Panier&action=1&idArticle=<?php echo $article['idArticle'] ?>&quantite=<?php echo $article['quantite'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo $article['prix'] . "  €" ?></h2>

                                            <p style="padding: 10px;"><?php echo $article['libelle']; ?></p>
                                            <a href="index.php?Module=Panier&action=1&idArticle=<?php echo $article['idArticle'] ?>&quantite=<?php echo $article['quantite'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            <a href="index.php?Module=Article&idArticle=<?php echo $article['idArticle'] ?>"><i
                                                    class="fa fa-plus-square"></i>Détail du produit</a></li>
                                        <!--<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php


                    }


                }

                ?></div>
			</div>
		</div>
	</section>

    <?php
    }

    function afficherCarousel () {
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

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-1.jpg" class="girl img-responsive"
                                             alt=""/>
                                        <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Brain</span>-IT</h1>

                                        <h2>Description du produit</h2>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-2.jpg" class="girl img-responsive"
                                             alt=""/>
                                        <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Brain</span>-IT</h1>

                                        <h2>Description du produit</h2>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-3.jpg" class="girl img-responsive"
                                             alt=""/>
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
=======
<?php

class VueHomePage {
    function __construct () {

    }

    function afficherHomePage ($listeTopArticle) {
        $this->afficherCarousel();

        ?>
        <div class="col-sm-12 padding-right">
            <div class="features_items">
                <h2 class="title text-center">Nouveaux articles</h2><?php



                foreach ($listeTopArticle as $categorie => $ListeArticle) {
                    foreach ($ListeArticle as $article) {
                        $article = $article->getArticle(); ?>

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="Assets/images/home/no_photo.gif" alt=""/>

                                        <h2><?php$article['prix'] . "  €" ?></h2>

                                        <p><?php echo $article['libelle']; ?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Ajouter
                                            au panier</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php$article['prix'] . "  €" ?></h2>

                                            <p><?php echo $article['libelle']; ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            <a href="index.php?Module=Article&idArticle=<?php echo $article['idArticle'] ?>"><i
                                                    class="fa fa-plus-square"></i>Détail du produit</a></li>
                                        <!--<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php


                    }


                }

                ?></div>
        </div>
    <?php
    }

    function afficherCarousel () {
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

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-1.jpg" class="girl img-responsive"
                                             alt=""/>
                                        <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Brain</span>-IT</h1>

                                        <h2>Description du produit</h2>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-2.jpg" class="girl img-responsive"
                                             alt=""/>
                                        <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Brain</span>-IT</h1>

                                        <h2>Description du produit</h2>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Accéder au détail</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="Assets/images/home/caroussel-3.jpg" class="girl img-responsive"
                                             alt=""/>
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
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
