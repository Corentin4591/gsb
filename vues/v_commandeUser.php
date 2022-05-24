<html>
    <head>
       <meta charset="utf-8">
        <link href="modele/tab.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Mes commandes</h1>
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
                        for ($i = 0 ; $i < sizeof($commandeUser); $i++ ){ ?>
                            <tr>
                                <td><?php echo $commandeUser[$i]['id'];?></td>
                                <td><?php echo $commandeUser[$i]['dateCommande'];?></td>
                                <td><?php echo $commandeUser[$i]['nomPrenomClient'];?></td>
                                <td><?php echo $commandeUser[$i]['adresseRueClient'];?></td>
                                <td><?php echo $commandeUser[$i]['cpClient'];?></td>
                                <td><?php echo $commandeUser[$i]['villeClient'];?></td>
                                <td><?php echo $commandeUser[$i]['mailClient'];?></td>
                                <td><?php echo $commandeUser[$i]['id_utilisateurs'];?></td>
                                <td><?php echo $commandeUser[$i]['statut'];?></td>
                            </tr>
                        <?php
                        }  ?>
                </tbody>
            </table>