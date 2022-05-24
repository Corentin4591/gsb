<div>
<h4>Trier par prix :
<a href ="index.php?uc=voirProduits&action=triProduits&ordre=ASC">Croissant</a>
<a href ="index.php?uc=voirProduits&action=triProduits&ordre=DESC">Décroissant</a></h4>
</div>
<div id="produits">
<?php
// parcours du tableau contenant les produits à afficher
foreach( $produits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	// affichage d'un produit avec ses informations
	?>	
	<div class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $description ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>
			<div class="imgCard"><a href="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier"> 
			<img src="images/mettrepanier.png" TITLE="Ajouter au panier" alt="Mettre au panier"> </a></div>
			
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
