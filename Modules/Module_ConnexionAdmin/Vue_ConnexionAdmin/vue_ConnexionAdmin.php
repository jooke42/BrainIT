<<<<<<< HEAD
<?php

class VueConnexionAdmin {

    function affichageFormConnexion () {

        if (!isset($_SESSION['Utilisateur'])) {
            echo '<form class="connexion" name="input" action ="index.php?Module=ConnexionAdmin&action=1" method="post" enctype="multipart/form-data">
					<label>Email : </label>
					<br>
			   		<input type="text" name="email" size="20" required  /> 
			  		<br>
			  		<label>Mot de passe</label>
					<br>
				 	<input type="password" name="pass" size="20" />
					<br>
			   		<input name="Envoyer" value="Envoyer" type="submit">
				</form><br>
				<div class="connexion"><a href=index.php?Module=Inscription&action=0>S\'inscrire en cliquant ici </a></div>	';
        } else {
            echo '<br>Vous �tes d�j� connect�<br>';
        }


    }
}

?>
=======
<?php

class VueConnexionAdmin {

    function affichageFormConnexion () {

        if (!isset($_SESSION['Utilisateur'])) {
            echo '<form class="connexion" name="input" action ="index.php?Module=ConnexionAdmin&action=1" method="post" enctype="multipart/form-data">
					<label>Email : </label>
					<br>
			   		<input type="text" name="email" size="20" required  /> 
			  		<br>
			  		<label>Mot de passe</label>
					<br>
				 	<input type="password" name="pass" size="20" />
					<br>
			   		<input name="Envoyer" value="Envoyer" type="submit">
				</form><br>
				<div class="connexion"><a href=index.php?Module=Inscription&action=0>S\'inscrire en cliquant ici </a></div>	';
        } else {
            echo '<br>Vous �tes d�j� connect�<br>';
        }


    }
}

?>
>>>>>>> 57e8c5ec3ce809f43b687297c8e1861f29be8835
