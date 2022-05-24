<?php
	$action = $_REQUEST['action'];
	switch($action)
	{
		case 'seConnecter' :
            {

                if(isset($_POST['submit'])){
                    $pseudo = $_POST['username'];
                    $pass = $_POST['password'];
                    if($pseudo == 'admin') { //si le pseudo de connexion est admin, recherche dans la table admin
                        $conn = connexionPDO();
                        $req = $conn ->prepare('SELECT nom FROM administrateur WHERE nom = :pseudo AND mdp = :pass');
                        $req->execute(array(
                            'pseudo' => $pseudo,
                            'pass' => $pass));
                        $res = $req->fetch();
                    }
                    else { //sinon recherche dans la table utilisateurs pour les clients
                        $conn = connexionPDO();
                        $req = $conn ->prepare('SELECT email FROM utilisateurs WHERE email = :mail AND mdp = :pass');
                        $req->execute(array(
                            'mail' => $pseudo,
                            'pass' => $pass));
                        $res = $req->fetch();
                    }
         
                    if (!$res) { //si connexion échoué
                        echo 'Mauvais identifiant ou mot de passe !';
                    }
                    else {//si connexion réussi 
                        if ($pseudo == 'admin'){
                            $_SESSION['login'] = $pseudo; // $_SESSION['login'] == admin
                        }
                        else {
                            $sess = getIdUser($pseudo);
                            $_SESSION['login'] = $sess[0];  //  $_SESSION['login'] == l'id de l'utilisateur
                        }
                        header('Location: index.php?uc=connexion&action=seConnecter ');
                        echo 'Vous êtes connecté !';
                    }
                }
                break;
            }

            case 'deconnexion' :{
                session_destroy();
                header('Location: index.php?uc=accueil ');
            }break;
        }
        include("vues/v_connexion.php");
        

                ?>