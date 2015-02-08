<?php

class VueCategorie {
    function __construct () {

    }

    function afficherArticle ($listeArticle) {


            foreach ($listeArticle as $article) {
                $article = $article->getArticle(); ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo $article["Photo"] ;?>" alt=""/>

                                <h2><?php echo $article['prix'] . "  €"; ?></h2>

                                <p><?php echo $article['libelle']; ?></p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Ajouter
                                    au panier</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2><?php echo $article['prix'] . "  €" ;?></h2>

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
            ?>
            </tbody>
        </table>

    <?php
    }
}