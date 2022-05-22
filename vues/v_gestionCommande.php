<html>
    <head>
       <meta charset="utf-8">
        <link href="modele/tab.css" rel="stylesheet" type="text/css">
    </head>
    <body>
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
                    for ($i = 0 ; $i < sizeof($lesCommandes); $i++ ){ ?>
                        <tr>
                            <td><?php echo $lesCommandes[$i]['id'];?></td>
                            <td><?php echo $lesCommandes[$i]['dateCommande'];?></td>
                            <td><?php echo $lesCommandes[$i]['nomPrenomClient'];?></td>
                            <td><?php echo $lesCommandes[$i]['adresseRueClient'];?></td>
                            <td><?php echo $lesCommandes[$i]['cpClient'];?></td>
                            <td><?php echo $lesCommandes[$i]['villeClient'];?></td>
                            <td><?php echo $lesCommandes[$i]['mailClient'];?></td>
                            <td><?php echo $lesCommandes[$i]['id_utilisateurs'];?></td>
                            <td><?php echo $lesCommandes[$i]['statut'];?></td>
                        </tr>
                    <?php
                    }  ?>
                </tbody>
            </table>


            
