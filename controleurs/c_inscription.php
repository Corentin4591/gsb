<?php
	$action = $_REQUEST['action'];
	switch($action)
	{
		case 'inscription' :
            {
                if(isset($_POST['submit'])){
                    $mail = $_POST['email'];
                    $pass = $_POST['password'];
                    if (estUnMail($mail) == true){
                        if (verifPassword($pass) == true){
                            $conn = connexionPDO();
                            $req = $conn ->prepare('INSERT INTO utilisateurs (email, mdp) VALUES (:mail, :pass)');
                            $req->execute(array(
                                'mail' => $mail,
                                'pass' => $pass));
                            echo 'Inscription réussi';
                        }
                        else echo 'Votre mot de passe n\'est pas assez complexe';
                    }
                    else echo 'Votre email n\'est pas valide';
                    
                }
                else {
                    echo 'Veillez renseignez un email valide et mot de passe assez complexe';
                }
        include("vues/v_inscription.php");
        }
    }  

                ?>