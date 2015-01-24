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
<?php include_once("Assets/include/head.php");?>
<!-- *************************************************************************************END*HEAD************************************************************************************ -->

<!-- ***************************************************************************************BODY**************************************************************************************** -->
<body>
	<!-- *****************************NAV DE GAUCHE****************************** -->
	<?php include_once("Assets/include/nav-horizontal.php");?>
	<!-- *************************FIN*NAV DE DROITE*************************** -->
	<div class="container">
	
	
	
	
	
	
        
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

<!-- ***********************************************************************************END*FOOTER*********************************************************************************** -->


<script src="../BrainIT/Assets/js/jquery.js"></script>
<script src="../BrainIT/Assets/js/bootstrap.min.js"></script>
<script src="../BrainIT/Assets/js/jquery.scrollUp.min.js"></script>
<script src="../BrainIT/Assets/js/price-range.js"></script>
<script src="../BrainIT/Assets/js/jquery.prettyPhoto.js"></script>
<script src="../BrainIT/Assets/js/main.js"></script>

</html>
<?php ?>
