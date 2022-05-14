<html>
    
    <head>
       <meta charset="utf-8">
<link href="modele/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="container">
           
            <form action="index.php?uc=connexion&action=seConnecter" method="POST">
                <h1 id="lg">Connexion</h1>
               
                <label id="lbl"><b>Nom d'utilisateur</b></label>
                <input id="txt" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
 
                <label id="lbl"><b>Mot de passe</b></label>
                <input id="txt" type="password" placeholder="Entrer le mot de passe" name="password" required>
 
                <input type="submit" name='submit' value='LOGIN' >
            </form>
        </div>
    </body>
</html>