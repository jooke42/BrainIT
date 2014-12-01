<?php
class VueCategorie{
	function __construct(){
		
	}
	function afficherArticle($listeArticle){
		?><table class="table table-striped table-hover ">
		<thead>
		 <tr>
            <th>reference</th>
            <th>libelle</th>
            <th>description</th>
            <th>quantité en stock</th>
            <th>prix à l'unité</th>
        </tr>
    	</thead>
    	<tbody><?php
		foreach ($listeArticle as $article){
			$article=$article->getArticle();
			?>
			<tr>
            <th><?php echo $article['reference'] ;?></th>
            <th><?php echo  $article['libelle'];?></th>
            <th><?php echo $article['description'];?></th>
            <th><?php echo $article['quantiteStock'];?></th>
            <th><?php echo  $article['prix']."€";?></th>
        </tr>
			
			
			
			<?php
			
		}
		?>
		</tbody>
		</table>
		
		<?php
	}
}