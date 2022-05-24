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
                        <tr>
                            <td><?php echo $laCommande[0]['id'];?></td> 
                            <td><?php echo $laCommande[0]['dateCommande'];?></td>
                            <td><?php echo $laCommande[0]['nomPrenomClient'];?></td>
                            <td><?php echo $laCommande[0]['adresseRueClient'];?></td>
                            <td><?php echo $laCommande[0]['cpClient'];?></td>
                            <td><?php echo $laCommande[0]['villeClient'];?></td>
                            <td><?php echo $laCommande[0]['mailClient'];?></td>
                            <td><?php echo $laCommande[0]['id_utilisateurs'];?></td>
                            <td><?php echo $laCommande[0]['statut'];?></td>
                        </tr>
                </tbody>
            </table>
            <form method="post" action="index.php?uc=majCommande&action=majCommande&id=<?php echo $laCommande[0]['id']?>">
                <select name ="statut">
                    <option value="PRP">En préparation</option>
                    <option value="CL">En livraison</option>
                    <option value="L">Livrée</option>
                </select><br />
                <input type="submit" value="Enregistrer" name="submit">
            </form>
            <?php
            if (isset($_POST['submit'])){ //quand le bouton est cliqué, la commande est mise à jour avec le nouveau statut
                majCommande($_POST['statut'],$laCommande[0]['id']);
            }
            ?>
        <div>