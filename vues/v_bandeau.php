<div id="bandeau">
<!-- Images En-tête -->
<img src="images/logo.jpg"	alt="GsbLogo" title="GsbLogo"/>
</div>
<!--  Menu haut-->
<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirProduits&action=voirCategories"> Nos produits par catégorie </a></li>
	<li><a href="index.php?uc=voirProduits&action=nosProduits"> Nos produits </a></li>
	<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>
  <?php if(!isset($_SESSION['login'])) { //utilisateur connecté = pas de bouton s'inscire?> 
    <li><a href="index.php?uc=inscrire&action=inscription"> S'inscrire </a></li>
            <?php 
          }  ?>
	<?php 
          if(!isset($_SESSION['login'])) { // si utilisateur pas connecter = de bouton connexion?>
            <li><a class="btn" href="index.php?uc=connexion&action=seConnecter">Connexion</a></li>
            <?php 
          }  
          else { //si utilisateur connecter = bouton deconnexion?> 
            <li><a class="btn" href="index.php?uc=connexion&action=deconnexion">Deconnexion</a></li>
            <?php 
          }
          if (isset($_SESSION['login']) ){ 
            if ($_SESSION['login'] == 'admin') { //si utilisateur = admin --> bouton gestion commande
              ?>
              <li><a class="btn" href="index.php?uc=gestionCommande&action=gererCommande">Gestion Commande</a></li>
              <?php      
            }
            if ($_SESSION['login'] != 'admin') { //si utlisiteur n'est pas admin --> bouton suivre ses commandes
              ?>
              <li><a class="btn" href="index.php?uc=gestionCommande&action=suivreCommande">Suivre mes commandes</a></li>
              <?php      
            }
          }
          
          ?> 
	
</ul>
