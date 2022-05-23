<?php
if ($_SESSION['login'] != 'admin'){
    echo 'Veuillez vous connecter en tant qu\'administrateur';
}
else {
    $action = $_REQUEST['action'];
    $id = $_REQUEST['id'];
	switch($action)
	{
		case 'majCommande' : {
            $laCommande = getCommandeById($id);
            include("vues/v_majCommande.php");
        }
    }
}
