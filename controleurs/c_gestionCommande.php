<?php
if ($_SESSION['login'] != 'admin'){
    echo 'Veillez vous connecter en tant qu\'administrateur';
}
else {
    $action = $_REQUEST['action'];
	switch($action)
	{
		case 'gererCommande' : {
            $lesCommandes = getCommandes();
            $lesCommandesF = getCommandesF();
            include("vues/v_gestionCommande.php");
        }
    }
}

	