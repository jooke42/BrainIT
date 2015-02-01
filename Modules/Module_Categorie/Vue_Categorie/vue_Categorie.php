<?php

class VueCategorie {
    function __construct () {

    }

    function afficherArticle ($listeArticle) {

        ?>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>reference</th>
                <th>libelle</th>
                <th>description</th>
                <th>quantit� en stock</th>
                <th>prix � l'unit�</th>
            </tr>
            </thead>
            <tbody><?php
            foreach ($listeArticle as $article) {
                $article = $article->getArticle();
                ?>
                <tr>
                    <th><?php echo $article['reference']; ?></th>
                    <th><?php echo $article['libelle']; ?></th>
                    <th><?php if (strlen($article['description']) > 100) {
                            $str = substr($article['description'], 0, 100) . '...';
                            echo $str;
                        } else {
                            echo $article['description'];
                        }
                        ?></th>
                    <th><?php echo $article['quantiteStock']; ?></th>
                    <th><?php echo $article['prix'] . "�"; ?></th>
                </tr>



            <?php

            }
            ?>
            </tbody>
        </table>

    <?php
    }
}