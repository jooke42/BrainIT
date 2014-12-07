<?php
ob_start ();
session_start ();
ini_set ( "display_errors", 1 );
error_reporting ( E_ALL );

define ( 'TEST_INCLUDE', 1 );

include ("Assets/include/params_connexion.php");
include ("Assets/include/module.php");
include ("Assets/include/dbmapper.php");
$connexion = new PDO ( $dns, $user, $password );
DBMapper::init ( $connexion );

?>
<!doctype html>
<html lang="fr">
<!-- ***************************************************************************************HEAD**************************************************************************************** -->
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>HomePage Brain IT</title>

<link rel="stylesheet"
	href="Assets/CSS/bootstrap-3.3.1-dist/dist/css/bootstrap.min.css">

<link rel="stylesheet"
	href="Assets/CSS/bootstrap-3.3.1-dist/dist/css/bootstrap-theme.min.css">

<link rel="stylesheet"

	href="Assets/CSS/materialDesign/css/ripples.min.css">
<link rel="stylesheet"
	href="Assets/CSS/materialDesign/css/material-wfont.min.css">


<link rel="stylesheet"
	href="Assets/CSS/bootstrap-3.3.1-dist/dist/css/material.min.css">

<link rel="stylesheet" href="Assets/CSS/StyleCommun.css">


<script src="script.js"></script>
<style>
</style>
</head>
<!-- *************************************************************************************END*HEAD************************************************************************************ -->

<!-- ***************************************************************************************BODY**************************************************************************************** -->
<body>
	<!-- *****************************NAV DE GAUCHE****************************** -->
	<nav>
		<div class="navbar barreNav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a id="navColor" class="navbar-brand" href="index.php">BrainIT</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a id="navColor" href="javascript:void(0)">Active</a></li>
					<li><a id="navColor" href="javascript:void(0)">Link</a></li>
					<li class="dropdown"><a id="navColor" href="javascript:void(0)"
						class="dropdown-toggle" data-toggle="dropdown">Catégories <b
							class="caret"></b></a>
						<ul class="dropdown-menu">

							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Carte+mere">Carte
									mère</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Carte+graphique">Carte
									graphique</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Disque+dur">Disque
									dur</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Memoire+vive">Mémoire
									vive</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Processeur">Processeur</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Peripherique">Périphériques</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0&categorie=Souris">Souris</a></li>
							<li><a
								href="index.php?Module=Categorie&action=0$categorie=Clavier">Clavier</a></li>

						</ul></li>
				</ul>
				<form class="navbar-form navbar-left">
					<input name="search" id="search" type="text" class="form-control col-lg-8"
						placeholder="Search">
				</form>
				<!-- *************************FIN*NAV DE GAUCHE*************************** -->

				<!-- ***************************NAV DE DROITE***************************** -->
				<ul class="nav navbar-nav navbar-right">
					
					<li><a id="navColor" href="javascript:void(0)">Panier</a></li>
					<?php if (! isset ( $_SESSION ['Utilisateur'] )) {?>
					<li>
                        <?php
																								
																									echo '<a id="navColor" href="index.php?Module=Connexion">Connexion</a>';
																								
                       
					?></li><?php }else{
					
					?>	
					<li class="dropdown"><a id="navColor" href="javascript:void(0)"
						class="dropdown-toggle" data-toggle="dropdown"><?php if (isset ( $_SESSION ['Utilisateur'] )){echo $_SESSION ['Utilisateur']['nom']." ".$_SESSION ['Utilisateur']['prenom']  ;}else echo "Profil";  ?> <b
							class="caret"></b></a>
						<ul class="dropdown-menu">
							<li id="navColor"><a href="javascript:void(0)">Profil</a></li>
							
							<li class="divider">
                                
																																
							<li id="navColor"><a href="Assets/include/deconnexion.php">Deconnexion</a></li>
																														
                            </li><?php }?>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- *************************FIN*NAV DE DROITE*************************** -->

	
	
	
	
	
	<!-- *****************************CAROUSEL****************************** -->
	<div class="container ">
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
												if (isset ( $_GET ['Module'] )) {
													$module = $_GET ['Module'];
													include ('Modules/Module_' . $module . '/' . $module . '.php');
													$monModule = new $module ();
												} else {
													$module = "HomePage";
													include ('Modules/Module_' . $module . '/' . $module . '.php');
													$monModule = new $module ();
												}
												ob_end_flush ();
												?>
			
	</div>

</body>

<!-- *************************************************************************************END*BODY************************************************************************************ -->

<!-- **************************************************************************************FOOTER************************************************************************************* -->
<footer>
	<p>Copyright ©</p>
</footer>
<!-- ***********************************************************************************END*FOOTER*********************************************************************************** -->

<script type="text/javascript"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="Assets/CSS/bootstrap-3.3.1-dist/dist/js/bootstrap.min.js"></script>



<script src="Assets/CSS/materialDesign/js/ripples.min.js"></script>
<script src="Assets/CSS/materialDesign/js/material.min.js"></script>
<script>
            $(document).ready(function() {
                $.material.init();
            });
            $("search").keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $("form").submit();
                }
            });
        </script>



</html>
<?php ?>