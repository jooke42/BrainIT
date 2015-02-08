<?php
ob_start();
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);

define ('TEST_INCLUDE', 1);

include("Assets/include/params_connexion.php");
include("Assets/include/module.php");
include("Assets/include/dbmapper.php");
$connexion = new PDO ($dns, $user, $password);
DBMapper::init($connexion);

include_once("Assets/include/head.php");
?>

<body>

<?php
include_once("Assets/include/nav-horizontal.php");
?>

<div class="container">


    <?php
    if (isset ($_GET ['Module'])) {
        $module = $_GET ['Module'];
        include('Modules/Module_' . $module . '/' . $module . '.php');
        $monModule = new $module ();
    } else {
        $module = "HomePage";
        include('Modules/Module_' . $module . '/' . $module . '.php');
        $monModule = new $module ();
    }
    ob_end_flush();
    ?>

</div>







<?php
include_once("Assets/include/footer.php");
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="Assets/js/jquery.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>
<script src="Assets/js/jquery.scrollUp.min.js"></script>
<script src="Assets/js/price-range.js"></script>
<script src="Assets/js/jquery.prettyPhoto.js"></script>
<script src="Assets/js/main.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="Assets/js/bootstrap-image-gallery.min.js"></script>
</body>
</html>

