<?php
class VueConnexion {
	function affichageFormConnexion() {
		if (! isset ( $_SESSION ['Utilisateur'] )) {
			?><div class="col-md-offset-4 col-md-4">
	<div class="jumbotron">
		<form class="form-horizontal" name="input"
			action="index.php?Module=Connexion&action=1" method="post"
			enctype="multipart/form-data">

			<div class="form-group">
			<label for="inputEmail" class="col-lg-3 control-label" style="text-align: left;">Email</label>
		


				<div class="col-lg-10">

					<input type="email" class="form-control" id="inputEmail"
						placeholder="Email">
				</div>
			</div>
			<div class="form-group">
			<label for="inputPassword" class="col-lg-3 control-label">Password</label>
			<div class="col-lg-10">
				<input type="password" class="form-control" id="inputPassword"
					placeholder="Password">

			</div>
			</div>

			<input name="Envoyer" value="Envoyer" type="submit">

		</form>
		<br>
		<div class="connexion">
			<a href=index.php?Module=Inscription&action=0>S'inscrire en cliquant
				ici </a>
		</div>
		';

	</div>
</div>

<?php
		} else {
			echo '<br>Vous �tes d�j� connect�<br>';
		}
	}
}

?>
