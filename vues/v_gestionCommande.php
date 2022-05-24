<html>
    <head>
       <meta charset="utf-8">
        <link href="modele/tab.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Commandes en cours</h1>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>id Commande</th>
                        <th>Date</th>
                        <th>Nom et Prénom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville </th>
                        <th>Email</th>
                        <th>id User</th>
                        <th>Statut de la commande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for ($i = 0 ; $i < sizeof($lesCommandes); $i++ ){ //boucle qui affiche les commandes en cour ?>
                            <tr>
                                <td><?php echo $lesCommandes[$i]['id'];?></td>
                                <td><?php echo $lesCommandes[$i]['dateCommande'];?></td>
                                <td><?php echo $lesCommandes[$i]['nomPrenomClient'];?></td>
                                <td><?php echo $lesCommandes[$i]['adresseRueClient'];?></td>
                                <td><?php echo $lesCommandes[$i]['cpClient'];?></td>
                                <td><?php echo $lesCommandes[$i]['villeClient'];?></td>
                                <td><?php echo $lesCommandes[$i]['mailClient'];?></td>
                                <td><?php echo $lesCommandes[$i]['id_utilisateurs'];?></td>
                                <td><?php echo $lesCommandes[$i]['statut'];?><br><a href="index.php?uc=majCommande&action=majCommande&id=<?php echo $lesCommandes[$i]['id']?>">Maj statut</td>
                            </tr>
                        <?php
                        }  ?>
                </tbody>
            </table>
        </div>
        <h1>Commandes livrées</h1>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>id Commande</th>
                        <th>Date</th>
                        <th>Nom et Prénom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville </th>
                        <th>Email</th>
                        <th>id User</th>
                        <th>Statut de la commande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for ($i = 0 ; $i < sizeof($lesCommandesF); $i++ ){ //boucle qui affiche les commandes livrées?>
                            <tr>
                                <td><?php echo $lesCommandesF[$i]['id'];?></td>
                                <td><?php echo $lesCommandesF[$i]['dateCommande'];?></td>
                                <td><?php echo $lesCommandesF[$i]['nomPrenomClient'];?></td>
                                <td><?php echo $lesCommandesF[$i]['adresseRueClient'];?></td>
                                <td><?php echo $lesCommandesF[$i]['cpClient'];?></td>
                                <td><?php echo $lesCommandesF[$i]['villeClient'];?></td>
                                <td><?php echo $lesCommandesF[$i]['mailClient'];?></td>
                                <td><?php echo $lesCommandesF[$i]['id_utilisateurs'];?></td>
                                <td><?php echo $lesCommandesF[$i]['statut'];?>
                            </tr>
                        <?php
                        }  ?>
                </tbody>
            </table>
        </div>
                
            
