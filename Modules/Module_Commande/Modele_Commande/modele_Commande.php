<?php
if ( !defined ( 'TEST_INCLUDE' ) )
    die ( "Vous n'avez pas accès directement �&nbsp; ce fichier" );


class ModeleCommande extends DBMapper
{
    protected $idCommande;
    protected $status;// Etat paiement
    protected $dateLivraison;//Etat livraison
    protected $listeArticles;
    protected $adresseLivraison;

    function __construct ( $idCommande )
    {
        // Recuperation des infos de la commande
        $commande = self::requeteFromBD ( "select idCommande, status, dateLivraison, idClient from commande where idCommande=:idCommande", array ( 'idCommande' => $idCommande ) );
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
        $this->listeArticles = $donneesCommandeArticles;
        //Partie livraison:
        $adresse                = self::requeteFromBD ( "select numero, adresse, codePostal, ville, pays from client where idClient=:idClient", array ( 'idClient' => $commande[ 'idClient' ] ) );
        $adresse                = $adresse[ 0 ];
        $this->adresseLivraison = $adresse;
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
        $resultat = $reponse->fetchAll ();

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
                $donneesArticleCommande = array ( 'idCommande' => $idCommande, 'reference' => $articleRecuperee[ 'reference' ], 'libelle' => $articleRecuperee[ 'libelle' ], 'idCategorie' => $articleRecuperee[ 'idCategorie' ], 'prix' => $articleRecuperee[ 'prix' ], 'quantite' => $article[ 'quantiteStock' ] );
                print_r ( $donneesArticleCommande );
                self::requeteFromBD ( "insert into ArticleCommande (idCommande, reference, libelle, prix, idCategorie, quantite) values (:idCommande, :reference, :libelle, :prix, :idCategorie, :quantite)", $donneesArticleCommande );
            }
            echo "Creation de la commande reussit num : " . $idCommande;
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
        $resultat = self::requeteFromBD ( "select idCommande from Commande where idClient=:idClient order by idCommande DESC limit 1", array ( 'idClient' => $idClient ) );
        $resultat = $resultat[ 0 ][ 0 ];

        return $resultat;
    }

    static function viderPanier ( $idClient )
    {
        self::requeteFromBD ( "delete from panier where idClient=:idClient", array ( 'idClient' => $idClient ) );
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
     * @return mixed
     */
    public function getAdresseLivraison ()
    {
        return $this->adresseLivraison;
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
            self::requeteFromBD ( "update commande set status=:status where idCommande=:idCommande", array ( 'status' => TRUE, 'idCommande' => $this->idCommande ) );
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
     * Valide une livraison
     */
    function validerLivraison ( $datePrevu )
    {
        self::requeteFromBD ( "update commande set dateLivraison=:dateLivraison where idCommande=:idCommande", array ( 'idCommande' => $this->idCommande, 'dateLivraison' => $datePrevu ) );
        $this->dateLivraison = $datePrevu;
    }



    /*
    static function createCommande($idClient){
        try{
            self::verifierPanier($idClient);
            self::requeteFromBD("insert into Commande (idClient) values (:idClient)", array('idClient' => $idClient));
            $idCommande=self::requeteFromBD("select idCommande from Commande where idClient=:idClient order by idCommande DESC limit 1",array('idClient' => $idClient));
            $idCommande=$idCommande[0];
            $articles=self::requeteFromBD("select idArticle, quantite from panier where idClient=:idClient",array('idClient' => $idClient));
            foreach($articles as $article){
                $articleRecuperee=self::requeteFromBD("select idArticle, reference, libelle, idCategorie, prix, quantiteStock from article where idArticle=:idArticle", array('idArticle' => $article['idArticle']));
                $articleRecuperee=$articleRecuperee[0];
                $donneesArticleCommande=array('idCommande' => $idCommande, 'reference' => $articleRecuperee['reference'], 'libelle' => $articleRecuperee['libelle'], 'idCategorie' => $articleRecuperee['idCategorie'], 'prix' => $articleRecuperee['prix'], 'quantite' => $articleRecuperee['quantiteStock']);
                self::requeteFromBD("insert into ArticleCommande (idCommande, reference, libelle, prix, idCategorie, quantite) values (:idCommande, :reference, :libelle, :prix, :idCategorie, :quantite)",$donneesArticleCommande);
            }
            echo "Creation de la commande reussit num : ".$idCommande;
            return $idCommande;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    */
    /*
    static function verifierPanier($idClient){
       $idPanier=self::requeteFromBD("select idPanier from panier where idClient=:idClient",array('idClient' => $idClient));
        $idPanier =$idPanier[0];

        if(count($idPanier)<=0){
            throw new Exception("Erreur: panier non existant ou client inconnu");
        }
*/
    /*
        $articles=self::requeteFromBD("select idArticle, quantite from panier where idClient=:idClient",array('idClient' => $idClient));
        if(count($articles)<=0){
            throw new Exception("Erreur: panier vide");
        }
        foreach($articles as $article){
            $articleRecuperee=self::requeteFromBD("select idArticle, reference, libelle, idCategorie, prix, quantiteStock from article where idArticle=:idArticle", array('idArticle' => $article['idArticle']));
            $articleRecuperee=$articleRecuperee[0];
            if($articleRecuperee == NULL || count($articleRecuperee)<=0){
                throw new Exception("Erreur : article inconnu numero ".$article['idProduit']);
            }
            if($articleRecuperee['quantiteStock']<$article['quantite']){
                throw new Exception("Erreur: le stock de l'article n'est pas suffisant : Voulu : ". $article['quantite']. "; Restant : ".$articleRecuperee['quantiteStock']);
            }
        }
    }
*/
}

