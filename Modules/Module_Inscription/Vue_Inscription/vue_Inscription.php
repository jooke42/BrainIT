<?php

class VueInscription {

    function affichageFormInscription () {
        if (!isset($_SESSION['Utilisateur'])) {
            echo '<form class="connexion" name="input" action ="index.php?Module=Inscription&action=1" method="post" enctype="multipart/form-data">
				<label>Nom: *</label>
				<br>
				<input type="text" name="nom" size="20" required /> 
				<br>
				<label>Prenom : *</label>
				<br>
				<input type="text" name="prenom" size="20" required  /> 
				<br>
				<label>Genre : *</label>
				<br>
				<select name="genre">
					<option value="1">Masculin</option>
					<option value="0">Feminin</option>
				</select>
				<br><br>
				<label>Email : *</label>
				<br>
				<input type="text" name="email" size="20" required /> 
				<br>
				<label>Mot de passe : *</label>
				<br>
				<input type="password" name="pass" size="20" required />
				<br>
				<label>Confirmer mot de passe : *</label>
				<br>
				<input type="password" name="passConf" size="20" required />
				<br>
				<label>Date de naissance: * </label>
				<br>
				<input type="date" name="datNais" size="20" required />
				<br>
				<label>Telephone : * </label>
				<br>
				<input type="text" name="telephone" size="20" required />
				<br>
				<input name="Envoyer" value="Envoyer" type="submit">
				<br>
				<p>Les champs marqués d\'une * sont oligatoires</p>
			</form>';
        } else {
            echo '<br>Vous �tes d�j� inscrit<br>';
        }
    }
}

?>
