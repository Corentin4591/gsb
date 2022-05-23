<?php
	$action = $_REQUEST['action'];
	switch($action)
	{
		case 'seConnecter' :
            {

                if(isset($_POST['submit'])){
                    $pseudo = $_POST['username'];
                    $pass = $_POST['password'];
                    if($pseudo == 'admin') {
                        $conn = connexionPDO();
                        $req = $conn ->prepare('SELECT nom FROM administrateur WHERE nom = :pseudo AND mdp = :pass');
                        $req->execute(array(
                            'pseudo' => $pseudo,
                            'pass' => $pass));
                        $res = $req->fetch();
                    }
                    else {
                        $conn = connexionPDO();
                        $req = $conn ->prepare('SELECT email FROM utilisateurs WHERE email = :mail AND mdp = :pass');
                        $req->execute(array(
                            'mail' => $pseudo,
                            'pass' => $pass));
                        $res = $req->fetch();
                    }
         
                if (!$res) {
                    echo 'Mauvais identifiant ou mot de passe !';
                }
                else
                    {
                    header('Location: index.php?uc=connexion&action=seConnecter ');
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