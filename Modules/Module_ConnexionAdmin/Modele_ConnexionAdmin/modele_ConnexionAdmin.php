<?php

class ModeleConnexionAdmin extends DBMapper {
	
	function connexion($email,$pass)  {
		
		$pass=sha1($pass);
		
		$req=self::$database->prepare("select * from Admin where email like '$email'");
		
		
		$req->execute();
		
		$resultat=$req->fetch();

		$passConf=$resultat['password'];
		
		if($passConf!=$pass) {
			var_dump($pass);
			var_dump($passConf);
			header ("Refresh: 0;URL=index.php?action=2&Module=ConnexionAdmin");
		}
		else {
			$_SESSION['Admin']=$resultat;
			$_SESSION['Utilisateur']=true;
			$_SESSION['idAdmin']=$resultat["idAdmin"];
			header("Refresh: 0;URL='index.php'");
		}
			
	}
}

?>
