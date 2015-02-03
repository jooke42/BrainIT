<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/14
 * Time: 16:09
 */
class VuePanier {

    function afficherPanier($req){
		?>

	
		
		<?php
		
		echo '<section id="cart_items">
		<div class="container">
			<!--<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Accueil</a></li>
				  <li class="active">Panier</li>
				</ol>
			</div>-->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="quantity">Quantité</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>'; ?>
		
					<?php
	
						$total = 0;
						$i = 0;
						while($resultat = $req->fetch()) { 
					
						$i++;
					?>
								
							<tr>
								<td class="cart_product">
									<a href=""><img style="width: 120px; height: 120px;" src="Assets/images/cart/no_photo.gif" alt=""></a>
								</td>

								<td class="cart_description">
									<h4 style="width: 400px; margin-left: 70px;"><a href="index.php?Module=Article&idArticle=<?php echo $resultat['idArticle']; ?>" >
	
									<?php if (strlen($resultat['libelle']) > 20){
					   						   	
								echo $resultat['libelle'] . '<br />';
						
								} else {

									echo $resultat['libelle'];

								}

								?></a></h4>
									<p style="margin-left: 70px;"><?php echo $resultat['reference'] ;?></p>
								</td>
				
								<td class="cart_price" style="padding-right: 25px;">
									<p><?php echo  $resultat['prix']." €";?></p>
								</td>

								<td class="cart_quantity" style="padding-right: 25px;">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" onClick="plus(<?php echo $i; ?>, <?php echo $resultat['quantiteStock'] ?>);" href="#"> + </a>
										<input id="champ_quantite<?php echo $i ?>" class="cart_quantity_input" type="text" name="quantity" value="<?php echo $resultat['quantite'];?>" autocomplete="off" size="2">
										<a class="cart_quantity_down" onClick="moins(<?php echo $i; ?>);" href="#"> - </a>
									</div>
								</td>

								<td class="cart_total" style="padding-right: 25px;">
									<p class="cart_total_price"><?php echo $resultat['quantite']*$resultat['prix']." €";
									$total+=$resultat['quantite']*$resultat['prix']; ?></p>
								</td>

								<td class="cart_delete" style="padding-right: 25px;">
									<a class="cart_quantity_delete" href="index.php?Module=Panier&action=3&idArticle=<?php echo $resultat['idArticle']; ?>"><i class="fa fa-times"></i></a>
								</td>
				
						</tr>
			
			
			
							<?php
			
						}

			 echo '</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action" style="margin-bottom: -100px;">
		<div class="container">
			<div class="heading">
				<h3>Que souhaitez-vous faire maintenant ?</h3>
				<p>Voici le détail de votre panier actuel :</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Nombre d\'articles : <span>'; ?><?php echo $i ?><?php echo'</span></li>
							<!--<li>Test <span>$2</span></li>-->
							<li>Frais de port : <span>Offerts</span></li>
							<li>Total pour ce panier : <span>'; ?><?php echo $total." €";?><?php echo'</span></li>
						</ul>
							<a class="btn btn-default update" href="">Mettre à jour les modifications</a>
							<a class="btn btn-default check_out" href="index.php?Module=Commande&action=0">Passer la commande</a>
					</div>
				</div>
			</div>
		</div>
	</section>'; /* do_action */

	?> <script type="text/javascript">
		function plus(i, quantiteStock) {
			if(document.getElementById("champ_quantite"+i).value < quantiteStock)
				document.getElementById("champ_quantite"+i).value++;
			else
				document.getElementById("champ_quantite"+i).value = quantiteStock;
		}

		function moins(i) {
			if(document.getElementById("champ_quantite"+i).value > 0)
				document.getElementById("champ_quantite"+i).value--;
			else
				document.getElementById("champ_quantite"+i).value = 0;
		}
		</script> <?php
	
	}

}

?>
