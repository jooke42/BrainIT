<?php

class VuePhoto {
	
	function affichageFormPhoto($idArticle) {
		echo '
		<form method="post" action="index.php?Module=Photo&actionPhoto=1&idArticle='.$idArticle.'" enctype="multipart/form-data">
			<p>Ajout d\'une photo</p>
			<label for="mon_fichier">Fichier (tous formats | max. 16 Mo) :</label><br />
			<input type="hidden" name="MAX_FILE_SIZE" value="16000000" />
			<input type="file" name="photo" id="photo" /><br />
			<label>Definir en photo principale : </label>
			<input type="checkbox" name="profil" checked="checked" /><br>
     			<input type="submit" name="submit" value="Envoyer" />
			
		</form>
		';
	}


	
	function affichagePhotoArticle($req) {
		
		
		//echo '<img id="profil_timeline-img" src="'.$resultat['photo'].'" height="160x" width="215px" />';
	
	}
	function affichagePhotoUser($req) {
		echo '<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
	<a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
		
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-link">
                        
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
';
echo '<div id="links">';
		while($resultat = $req->fetch()) {
			echo '<a href="'.$resultat['photo'].'" data-gallery>';
		    echo '<img src="'.$resultat['photo'].'" width="250px" height="200px">';
	   		echo '</a>';

   		}
echo '</div>';
	}

	
}

?>
