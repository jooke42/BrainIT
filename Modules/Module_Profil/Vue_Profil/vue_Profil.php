<?php

class VueProfil {
	
	function affichageProfil() {
		echo '<div id="profil">
				<div id="profil-infos">
					<div id="profil-gauche">
						<p class="elem_paragraphe">Nom : ';
						echo $_SESSION['Utilisateur']["nom"];
						echo '</p>
						<p class="elem_paragraphe">Prenom : ';
						echo $_SESSION['Utilisateur']["prenom"];
						echo '</p>
						<p class="elem_paragraphe">Genre : ';
						if($_SESSION['Utilisateur']["genre"]==1) {
							echo "Homme";
						}
						else {
							echo "Femme";
						}
						echo '</p>
						<p class="elem_paragraphe">Email : ';
						echo $_SESSION['Utilisateur']["email"];
						echo '</p>
					</div>
					<div id="profil-droite">
						<p class="elem_paragraphe">Date de Naissance : ';
						echo $_SESSION['Utilisateur']["datNais"];
						echo '</p>
						<p class="elem_paragraphe">Telephone : ';
						echo $_SESSION['Utilisateur']["telephone"];
						echo '</p>';
					
			echo'	</div>
			</div>';
	}
}

?>
