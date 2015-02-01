<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class VuePanier {

    function afficherPanier ($req) {
        ?>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Reference</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Quantite en stock</th>
                <th>Prix à l'unite</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody><?php

            while ($resultat = $req->fetch()) {
                ?>
                <tr>
                    <th><?php echo $resultat['reference']; ?></th>
                    <th>
                        <a href="index.php?Module=Article&idArticle=<?php echo $resultat['idArticle']; ?>"><?php echo $resultat['libelle']; ?></a>
                    </th>
                    <th><?php if (strlen($resultat['description']) > 100) {
                            $str = substr($resultat['description'], 0, 100) . '...';
                            echo $str;
                        } else {
                            echo $resultat['description'];
                        }
                        ?></th>
                    <th><?php echo $resultat['quantiteStock']; ?></th>
                    <th><?php echo $resultat['prix'] . "euros"; ?></th>
                    <th>
                        <a href="index.php?Module=Panier&action=3&idArticle=<?php echo $resultat['idArticle']; ?>">Supprimer</a>
                    </th>

                </tr>



            <?php

            }
            ?>
            </tbody>
        </table>

    <?php
    }
}

?>
