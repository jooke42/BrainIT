<?php

class ModelePhoto extends DBMapper {


	function uploadPhoto($idArticle,$index,$destination,$maxsize,$extensions) {


		//UPLOAD SUR LE FTP
		if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

		//Test2: taille limite
		if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
		//Test3: extension

		$ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
		if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
		//Déplacement

		$upload=move_uploaded_file($_FILES[$index]['tmp_name'],$destination);

		//INFO DANS BDD
		if($upload) {

			$req=self::$database->prepare("INSERT INTO photo (idArticle,taille,format,photo) VALUES ('$idArticle','$maxsize','$ext','$destination')");

			$req->execute();

			$idPhoto=self::$database->lastInsertId();

			echo '<img src="'.$destination.'" />';
			return $idPhoto;

		}


	}

	function affichagePhotoReq($idUser) {


		$req=self::$database->prepare("select * from user,photo where user.idUser=$idUser and photo.idUser=$idUser ");

		$req->execute();

		return $req;
	}


	function affichagePhotoProfilReq() {

		if(isset($_SESSION['idUser'])) {
			$idUser=$_SESSION['idUser'];
		}

		$req=self::$database->prepare("select idPhoto from user where idUser=$idUser ");



		$req->execute();
		$resultat=$req->fetch();
		$idPhoto=$resultat['idPhoto'];
		$req=self::$database->prepare("select photo from photo where photo.idUser=$idUser and photo.idPhoto=$idPhoto limit 1 ");
		$req->execute();
		return $req;

	}


	function affichagePhotoProfilReqUser($idContact) {



		$req=self::$database->prepare("select idPhoto from user where idUser=$idContact ");



		$req->execute();
		$resultat=$req->fetch();
		$idPhoto=$resultat['idPhoto'];
		$req=self::$database->prepare("select photo from photo where photo.idUser=$idContact and photo.idPhoto=$idPhoto limit 1 ");
		$req->execute();
		return $req;

	}


	function setPhotoPrincipale($destination,$idArticle) {

		$req=self::$database->prepare("UPDATE article SET Photo='$destination' WHERE idArticle=$idArticle");
		$req->execute();

	}


}

?>
