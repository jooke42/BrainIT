<?php


class ControleurCommande
{


    public  $idCommande;
    private $maVue;
    private $monModele;

    function __construct ( $module )
    {
        $nomVue    = 'Vue' . $module;
        $nomModele = 'Modele' . $module;
        if ( isset( $_GET[ 'idCommande' ] ) ) {
            $idCommande      = htmlspecialchars ( $_GET[ 'idCommande' ] );
            $this->monModele = new $nomModele( $idCommande );
        }
        $this->maVue = new $nomVue();
    }

    function setModele ()
    {
        $this->monModele = new ModeleCommande( ModeleCommande::getLastIdCommande ( $_SESSION[ 'idClient' ] ) );
    }

    function envoieBanque ()
    {
        $this->setModele ();
        if ( !$this->monModele->getStatus () ) {
            $this->paiementCommande ();
        } else {
            header('Location: index.php?Module=Commande&action=envoieFournisseur');
        }
    }

    function paiementCommande ()
    {
        $this->setModele ();
        if ( isset( $_POST[ 'validation' ] ) ) {
            if ( $_POST[ 'validation' ] == TRUE ) {
                $this->monModele->validerPaiementCommande ();
                header('Location: index.php?Module=Commande&action=envoieFournisseur');
            } else {
                echo "Echec du paiement";
            }
        } else {

//A SAVE
            ?>
            <body onload="submit()" >


            <form action="http://amfbank.esy.es/METHODOPROJET/local_AMF/index.php?module=APIPaiement&action=afficherPopup" method="post" id="form" >
		<input type="hidden" name="nom" value="BRAINIT" />
                <input type="hidden" name="montant" value='<?= $this->monModele->getMontantTotal () ?>' >
                <input type="hidden" name="url" value="<?= ModeleCommande::$urlPaiement ?>" />
                <input type="submit" value="envoyer" >
            </form >
            <script type="text/javascript" >
                function submit() {
                    var form = document.getElementById('form');
                    form.submit();
                }
            </script >
            </body >

        <?php
        }
    }

    /**
     * Fonction pour appeller la livraison
     */
    function envoieFournisseur ()
    {
        $this->setModele ();
        if ( $this->monModele->getDateLivraison () == NULL ) {
            if ( isset( $_SESSION[ 'token' ] ) ) {
                 //echo"J'ai déjà une session avec un token";
                $this->commandeLivraison ();
            } else if ( $_POST[ 'token' ] ) {
                $_SESSION[ 'token' ] = $_POST[ 'token' ];
                // echo"Je reçoit un token";
                $this->commandeLivraison ();
            } else {
                //echo"Je me connecte SWAG";
                $this->connexionLivraison ();
            }
        } else {
            $this->affichageFinCommande ();
        }
    }

    function commandeLivraison ()
    {
        $this->setModele ();
        $url = ModeleCommande::$urlLivraison;
        if ( isset( $_SESSION[ 'token' ] ) ) {

		if(isset($_POST['dateLivraison'])){
			$this->monModele->validerLivraison($_POST['dateLivraison']);
			header('Location: index.php?Module=Commande&action=affichageFinCommande');
		}else{
            echo '<body onload="submit()">';
            ?>

            <form action="http://pageperso.iut.univ-paris8.fr/~jdasilva/Metho/API/API_commande.php" method="post"
                  id="form" >
                <input type="hidden" name="token" value="<?= $_SESSION[ 'token' ] ?>" >
                <input type="hidden" name="commande" value='<?= $this->monModele->getJsonLivraison () ?>' >
                <input type="hidden" name="url" value="<?= $url ?>" />
                <input type="submit" value="envoyer" >
            </form >
            <?php
            echo '
    <script type="text/javascript">
     function submit(){
      var form = document.getElementById(\'form\');
      form.submit();
     }
    </script>
   </body>
   ';
		}
        } else {
            $this->connexionLivraison ();
        }
    }

    /**
     * Definit la variable de session du token
     */
    function connexionLivraison ()
    {
        if ( isset( $_POST[ 'token' ] ) ) {
            $_SESSION[ 'token' ] = $_POST[ 'token' ];
            echo "Connexion au service de livraison reussit !";
        } else if ( !isset( $_SESSION[ 'token' ] ) ) {
            echo '<body onload="submit()">
        <form action="http://pageperso.iut.univ-paris8.fr/~jdasilva/Metho/API/API_connexion.php" method="post" id="form">
                <input type="hidden" name="nomBoutique" value="BrainIT"/>
                <input type="password" name="password" value="' . md5 ( 'nbinqu9b8bu1jk6xyvu5jl62r' ) . '" />
                <input type="hidden" name="url" value ="' . ModeleCommande::$urlLivraison . '" />.
                <input type="submit" value="Envoyer"/>
                </form>
   ';
            echo '
    <script type="text/javascript">
     function submit(){
      var form = document.getElementById(\'form\');
      form.submit();
     }
    </script>
   </body>
   ';
        }
    }

    function affichageFinCommande ()
    {
        $this->setModele ();
        $information = $this->monModele->getRecapCommande ();
        $this->maVue->affichageFinalCommande ( $information );
    }

    /**
     * Vide le panier et créer une commande seulement si commande précedente confirmé
     */
    function creationCommande ()
    {
        if ( !isset( $_SESSION[ 'idClient' ] ) ) {
            die( "veuillez vous connecter" );
        }
        if ( ModeleCommande::getLastIdCommande ( $_SESSION[ 'idClient' ] ) == NULL ) {
            ModeleCommande::creationCommande ( $_SESSION[ 'idClient' ] );
            header('Location: index.php?Module=Commande&action=envoieBanque');
        } else {
            $this->setModele ();
            if ( $this->monModele->getStatus () == TRUE && $this->monModele->getDateLivraison () != NULL ) {
                ModeleCommande::creationCommande ( $_SESSION[ 'idClient' ] );
                header('Location: index.php?Module=Commande&action=envoieBanque');
            } else if($this->monModele->getStatus () == FALSE){
		header('Location: index.php?Module=Commande&action=envoieBanque');

		}else if($this->monModele->getDateLivraison() == NULL) {
               		header('Location: index.php?Module=Commande&action=envoieFournisseur');
            }
        }
    }
}
