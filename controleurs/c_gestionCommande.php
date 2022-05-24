<?php
$action = $_REQUEST['action'];
	switch($action)
	{
		case 'gererCommande' : {
            if ($_SESSION['login'] != 'admin'){
                echo 'Veillez vous connecter en tant qu\'administrateur';
            }
            else {
                $lesCommandes = getCommandes();
                $lesCommandesF = getCommandesF();
                include("vues/v_gestionCommande.php");
            }
            
        }

        case 'suivreCommande' : {
            if ($_SESSION['login'] != 'admin'){
                $commandeUser = getCommandeByUser($_SESSION['login']);
                include("vues/v_commandeUser.php");
            }
            
        }
    }

	