<?php ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 06 12 34 56 78</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> brain-it@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <!--<div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="Assets/images/home/logo.png" alt=""/></a>
                    </div>
                    <!--<div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php?Module=Profil"><i class="fa fa-user"></i> Compte</a></li>
                            <!--<li><a href="#"><i class="fa fa-star"></i> Liste de souhait</a></li>-->
                            <!--<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
                            <li><a href="index.php?Module=Panier&action=0"><i class="fa fa-shopping-cart"></i>
                                    Panier</a></li>
                            <?php
                            if(!isset($_SESSION['Utilisateur'])){
                                echo '<li><a href="index.php?Module=Connexion"><i class="fa fa-lock"></i> Connexion</a></li>';
                            }else{
                                echo '<li><a href="Assets/include/deconnexion.php"><i class="fa fa-lock"></i> Deconnexion</a></li>';
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php">Accueil</a></li>
                            <!-- class="active" -->
                            <!--<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>-->
                            <li><a href="index.php?Module=Categorie">Produits</a></li>
                            <!--<li><a href="product-details.html">Détail des produits</a></li>-->
                            <li><a href="index.php?Module=Panier&action=0">Panier</a></li>
                            <!--<li><a href="checkout.html">Checkout</a></li>-->
                            <!--<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>-->
                            <!--<li><a href="404.html">404</a></li>-->
                            <li><a href="index.php?Module=Contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="POST" action="index.php?Module=Categorie&action=1">
                            <input id="search" name="search" type="text" placeholder="Rechercher"/>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header><!--/header-->
