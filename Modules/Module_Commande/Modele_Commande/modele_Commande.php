<?php

if ( !defined ( 'TEST_INCLUDE' ) )
    die ( "Vous n'avez pas accès directement �&nbsp; ce fichier" );


class ModeleCommande extends DBMapper
{
    static    $urlPaiement  = "http://pageperso.iut.univ-paris8.fr/~bghezali/boutique/v2/index.php?Module=Commande&action=envoiePaiement"; // URL de retour de la banque
    static    $urlLivraison = "http://pageperso.iut.univ-paris8.fr/~bghezali/boutique/v2/index.php?Module=Commande&action=envoieFournisseur"; // URL de retour de la livraison protected $idCommande;
    protected $status;// Etat paiement
    protected $dateLivraison;//Etat livraison
    protected $listeArticles;
    protected $adresseLivraison;
    protected $nomPrenom;

    function __construct ( $idCommande )
    {
        // Recuperation des infos de la commande
        $commande = self::requeteFromBD ( "select idCommande, status, dateLivraison, idClient from Commande where idCommande=:idCommande", array ( 'idCommande' => $idCommande ) );
        $commande = $commande[ 0 ];
        if ( count ( $commande ) <= 0 ) {
            throw new Exception( "Erreur: commande inconnu" );
        }
        $this->dateLivraison = $commande[ 'dateLivraison' ]; //Etat livraison
        $this->status        = $commande[ 'status' ]; // Etat paiement
        $this->idCommande    = $commande[ 'idCommande' ];
        //Commande:
        $donneesCommandeArticles = self::requeteFromBD ( "select reference, libelle, idCategorie, prix, quantite from ArticleCommande where idCommande=:idCommande", array ( 'idCommande' => $idCommande ) );
        if ( count ( $donneesCommandeArticles ) == 0 ) {
            throw new Exception( "Les article de la commande sont non existants" );
        }
        $listeArticles       = $donneesCommandeArticles;
        $this->listeArticles = array ();
        foreach ( $listeArticles as $article ) {
            $articleDonnees = array ( 'reference' => $article[ 'reference' ], 'libelle' => $article[ 'libelle' ], 'idCategorie' => $article[ 'idCategorie' ], 'prix' => $article[ 'prix' ], 'quantite' => $article[ 'quantite' ] );
            array_push ( $this->listeArticles, $articleDonnees );
        }
        //Partie livraison:
        $adresse                = self::requeteFromBD ( "select numero, adresse, codePostal, ville, pays from Client where idClient=:idClient", array ( 'idClient' => $commande[ 'idClient' ] ) );
        $adresse                = $adresse[ 0 ];
        $this->adresseLivraison = array ( 'numero' => $adresse[ 'numero' ], 'adresse' => $adresse[ 'adresse' ], 'codePostal' => $adresse[ 'codePostal' ], 'ville' => $adresse[ 'ville' ], 'pays' => $adresse[ 'pays' ] );
        $this->nomPrenom        = self::requeteFromBD ( "select nom, prenom from Client where idClient=:idClient", array ( 'idClient' => $commande[ 'idClient' ] ) );
        $this->nomPrenom        = $this->nomPrenom[ 0 ];
    }

    /**     Cette méthode permet d'envoyer des requetes sur la BD
     * et de récupérer le resultat de la requete
     * Cette méthode fonctionne pour les insert ; update ; delete ; select
     *  Si vous souhaité une seul ligne, il faut récupéré l'indice 0
     * sur la valeur de retour,
     * exemple : return $resultat;
     *          $resultat[0]
     *
     * @param       $requete
     * @param array $donnees
     *
     * @return array de resultat dans le cas d'un select ou String
     * @throws Exception
     */
    private static function requeteFromBD ( $requete, $donnees = array () )
    {
        if ( $requete == NULL ) {
            throw new Exception( "Impossible de faire la requete car requete ou donnees vide" );
        }
        //Execution de la requete
        try {
            $reponse = self::$database->prepare ( $requete );
            if ( $reponse->execute ( $donnees ) == FALSE ) {
                throw new Exception ( "Requete a échoué, code erreur :" . $reponse->errorCode () . ";" );
            }
        } catch ( PDOException $e ) {
            echo 'Échec lors de la connexion : ' . $e->getMessage ();
        }

        if(substr($requete, 0, 6) == "insert"  || substr($requete, 0, 6) == "delete" || substr($requete, 0, 6) == "update" ){
            return true;
        }else{
            $resultat = $reponse->fetchAll ();
        }
        return $resultat;
    }

    static function creationCommande ( $idClient )
    {
        try {
            self::verificationPanier ( $idClient );
            self::requeteFromBD ( "insert into Commande (idClient) values (:idClient)", array ( 'idClient' => $idClient ) );
            $idCommande = self::getLastIdCommande ( $idClient );
            $articles   = self::requeteFromBD ( "select idArticle, quantite from panier where idClient=:idClient", array ( 'idClient' => $idClient ) );
            foreach ( $articles as $article ) {
                $articleRecuperee       = self::requeteFromBD ( "select idArticle, reference, libelle, idCategorie, prix, quantiteStock from article where idArticle=:idArticle", array ( 'idArticle' => $article[ 'idArticle' ] ) );
                $articleRecuperee       = $articleRecuperee[ 0 ];
                $donneesArticleCommande = array ( 'idCommande' => $idCommande, 'reference' => $articleRecuperee[ 'reference' ], 'libelle' => $articleRecuperee[ 'libelle' ], 'idCategorie' => $articleRecuperee[ 'idCategorie' ], 'prix' => $articleRecuperee[ 'prix' ], 'quantite' => $article[ 'quantite' ] );
                self::requeteFromBD ( "insert into ArticleCommande (idCommande, reference, libelle, prix, idCategorie, quantite) values (:idCommande, :reference, :libelle, :prix, :idCategorie, :quantite)", $donneesArticleCommande );
            }
            echo "<h2>Creation de la commande reussit num : " . $idCommande."</h2>";
            self::viderPanier ( $idClient );

            return $idCommande;
        } catch ( Exception $e ) {
            echo $e->getMessage ();
        }
    }

    static function verificationPanier ( $idClient )
    {
        $articles = self::requeteFromBD ( "select idArticle, quantite from panier where idClient=:idClient", array ( 'idClient' => $idClient ) );
        if ( count ( $articles ) <= 0 ) {
            throw new Exception( "Erreur: panier vide" );
        }
        foreach ( $articles as $article ) {
            $articleRecuperee = self::requeteFromBD ( "select idArticle, reference, libelle, idCategorie, prix, quantiteStock from article where idArticle=:idArticle", array ( 'idArticle' => $article[ 'idArticle' ] ) );
            $articleRecuperee = $articleRecuperee[ 0 ];
            if ( $articleRecuperee == NULL || count ( $articleRecuperee ) <= 0 ) {
                throw new Exception( "Erreur : article inconnu; numero :" . $article[ 'idProduit' ] );
            }
            if ( $articleRecuperee[ 'quantiteStock' ] < $article[ 'quantite' ] ) {
                throw new Exception( "Erreur: le stock de l'article n'est pas suffisant : Voulu : " . $article[ 'quantite' ] . "; Restant : " . $articleRecuperee[ 'quantiteStock' ] );
            }
        }
    }

    static function getLastIdCommande ( $idClient )
    {
        $idCommande = self::requeteFromBD ( "select idCommande from Commande where idClient=:idClient order by idCommande DESC limit 1", array ( 'idClient' => $idClient ) );
        if ( $idCommande == NULL || count ( $idCommande ) == 0 ) {
            return NULL;
        }
        $idCommande = $idCommande[ 0 ][ 0 ];

        return $idCommande;
    }

    static function viderPanier ( $idClient )
    {
        self::requeteFromBD ( "delete from panier where idClient=:idClient", array ( 'idClient' => $idClient ) );
    }

    /**
     * Paiement a été fait ou pas
     * @return mixed
     */
    public function getStatus ()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getIdCommande ()
    {
        return $this->idCommande;
    }

    /**
     * @return mixed
     */
    public function getDateLivraison ()
    {
        return $this->dateLivraison;
    }

    /**
     * Valide une commande
     * @throws Exception
     */
    function validerPaiementCommande ()
    {
        if ( $this->status == TRUE ) {
            throw new Exception( "La commande a deja été payé" );
        } else {
            self::requeteFromBD ( "update Commande set status=:status where idCommande=:idCommande", array ( 'status' => TRUE, 'idCommande' => $this->idCommande ) );
            $this->status = TRUE;
            //Quand paiement validé, alors on retire du stock les articles achetées
            $this->decrementerStock ();
        }
    }

    /**
     * Diminue le stock
     * @throws Exception
     */
    protected function decrementerStock ()
    {
        foreach ( $this->getListeArticles () as $article ) {
            self::requeteFromBD ( "update article set quantiteStock=quantiteStock-:quantite where reference=:reference", array ( 'reference' => $article[ 'reference' ], 'quantite' => $article[ 'quantite' ] ) );
        }
    }

    /**
     * Peut servir pour livraison
     * @return array
     */
    public function getListeArticles ()
    {
        return $this->listeArticles;
    }

    /**
     * Renvoie liste
     * idCommande
     * dateLivraison
     * prix total
     * articles = array(idArticle, reference, libelle, description)
     */
    public function getRecapCommande ()
    {
        $articles = array ();
        foreach ( $this->listeArticles as $article ) {
            $articleResultat = array ( 'reference' => $article[ 'reference' ], 'libelle' => $article[ 'libelle' ], 'prix' => $article[ 'prix' ], 'quantite' => $article[ 'quantite' ] );
            array_push ( $articles, $articleResultat );
        }
        $donnees = array ( 'idCommande' => $this->idCommande, 'dateLivraison' => $this->dateLivraison, 'prixTotal' => $this->getMontantTotal (), 'articles' => $articles );

        return $donnees;
    }

    /**
     * Pour paiement
     * @return int
     */
    function getMontantTotal ()
    {
        $somme = 0;
        foreach ( $this->listeArticles as $article ) {
            $somme += $article[ 'prix' ] * $article[ 'quantite' ];
        }

        return $somme;
    }

    /**
     * Valide une livraison
     */
    function validerLivraison ( $datePrevu )
    {
        $datePrevu     = date_create ( $datePrevu );
        $datePrevu     = date_format ( $datePrevu, 'Y-m-d' );
        $selecPreparee = self::$database->prepare ( 'update Commande set dateLivraison=? where idCommande=?' );
        $selecPreparee->execute ( Array ( $datePrevu, $this->idCommande ) );
        //self::requeteFromBD ( "update Commande set dateLivraison=:dateLivraison where idCommande=:idCommande", array ( 'idCommande' => $this->idCommande, 'dateLivraison' => "2015-06-05" ) );
        $this->dateLivraison = $datePrevu;
    }

    /**
     * Retourne le json :
     * pour la livraison
     * @return String
     */
    function getJsonLivraison ()
    {
        return json_encode ( $this->getArrayLivraison () );
    }

    /**
     * Retourne une liste de commande :
     * pour la livraison
     * @return array
     */
    function getArrayLivraison ()
    {
        $client   = array ( 'nom' => $this->nomPrenom[ 'nom' ], 'prenom' => $this->nomPrenom[ 'prenom' ], 'adresse' => $this->getAdresseLivraison () );
        $commande = array ( 'client' => $client, 'produit' => $this->getListesArticlesLivraison () );
        $json     = ( array ( 'commande' => $commande ) );

        return $json;
    }

    /**
     * numero, voie, ville , etc
     * @return mixed
     */
    public function getAdresseLivraison ()
    {
        return $this->adresseLivraison;
    }

    /**
     * Pour la livraison :
     * retourne liste d'articles sous la forme : array ('reference' , 'quantite')
     * @return array
     */
    public function getListesArticlesLivraison ()
    {
        $listArticles = array ();
        foreach ( $this->listeArticles as $article ) {
            $articleLivraison = array ( 'reference' => $article[ 'reference' ], 'quantite' => $article[ 'quantite' ] );
            array_push ( $listArticles, $articleLivraison );
        }

        return $listArticles;
    }
}
