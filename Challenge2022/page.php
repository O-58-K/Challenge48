<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/register.css">
        <title>Register</title>
    </head>
    <body>
        <div class="Forum">
            <a>Forum</a>
        </div>
        <form method="POST" action="">
            <div class="container">
                <div class="margcont">
                    <h1>Créer un compte</h1>
                    <div class="input">
                        <a>Nom d'utilisateur</a>
                        <input type="text" placeholder="nom" name="nom" value="<?php if(isset($nom)){ echo $nom;} ?>">
                    </div>
                    <div class="input">
                        <a>prenom</a>
                        <input type="text" placeholder="prenom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom;} ?>">
                    </div>
                    <div class="input">
                        <a>Adresse e-mail</a>
                        <input type="text" placeholder="e-mail" name="email" value="<?php if(isset($email)){ echo $email;} ?>">
                    </div>
                    <div class="input">
                        <a>Mot de passe</a>
                        <input type="password" placeholder="mot de passe" name="password">
                        <a class="condition">Le mot de passe doit contenir au moins 6 caractères, une majuscule, une minuscule et un caractère spécial.</a>
                    </div>
                    <button type="submit" name="submit">Créer mon compte</button>
                    <a>Vous possédez déjà un compte ? </a><a href="login.php" class="link">Connexion</a>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
    
include("loginDB.php");
loginDB();




  // Récuperation des input
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']); // sha1 hache le mdp

        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password']))
        {
            
            
                    $stmt = $mysqli->prepare("INSERT INTO user(nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')");
                    $stmt->execute();
                    header('Location: page.php');

                
        }
 
?>