<?php

class ModeleConnexion extends DBMapper {
	
	function connexion($email,$pass)  {
		
		$pass=sha1($pass);
		
		$req=self::$database->prepare("select * from Client where email like '$email'");
		
		
		$req->execute();
		
		$resultat=$req->fetch();

		$passConf=$resultat['password'];
		
		if($passConf!=$pass) {

			header ("Refresh: 0;URL=index.php?action=2&Module=Connexion");
		}
		else {
			$_SESSION['Utilisateur']=$resultat;
			$_SESSION['idClient']=$resultat["idClient"];
			header("Refresh: 0;URL='index.php'");
		}
			
	}
}

?>
