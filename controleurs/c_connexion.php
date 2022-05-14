<?php
	$action = $_REQUEST['action'];
	switch($action)
	{
		case 'seConnecter' :
            {

                if(isset($_POST['submit'])){
                    $pseudo = $_POST['username'];
                    $pass = $_POST['password'];
                    $conn = connexionPDO();
                    $req = $conn ->prepare('SELECT nom FROM administrateur WHERE nom = :pseudo AND mdp = :pass');
                    $req->execute(array(
                        'pseudo' => $pseudo,
                        'pass' => $pass));
                    $res = $req->fetch();
         
                if (!$res) {
                    echo 'Mauvais identifiant ou mot de passe !';
                }
                else
                    {
                    $_SESSION['login'] = $pseudo;
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