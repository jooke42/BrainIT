<?php

class VueCommande
{
    function affichageFinalCommande ( $req )
    {
        echo '<style>
			table, td, th {
				border: 1px solid black;
				text-align: center;
}

table {
				width: 100%;
			}

th {
				height: 50px;
}
</style>';
        echo '<h1>Page resume Commande</h1></br>
		Nous vous remercions de la confiance que vous nous portez, nous prevoyons pour date de livraison le ' . $req[ "dateLivraison" ] . '</br>
		Voici une recap de votre commande';
        echo '<table ><thead>
		 <tr>
            <th>Reference</th>
            <th>Libelle</th>
			<th>prix</th>
			<th>quantite</th>
        </tr>
    	</thead>

    	<tbody>';
        foreach ( $req[ "articles" ] as $resultat ) {
            echo '
			<tr>
            <th>' . $resultat[ "reference" ] . '</th>
            <th>' . $resultat[ "libelle" ] . '</th>
            <th>' . $resultat[ "prix" ] . '</th>
            <th>' . $resultat[ "quantite" ] . '</th>

				</tr>';
        }
        echo '
		</tbody>
		</table>';
        echo 'prix total ' . $req[ "prixTotal" ] . ' €';
    }

    function ErreurPageCommande ()
    {
        echo '<p> Vous n\'avez pas le droit d\acceder à cette page <a href="index.php"> Revenir à l\'accueil</a>';
    }
}
