<?php
    $db = mysqli_connect ('localhost', 'root', '', 'livreor'); 

    $nbr_ligne = mysqli_num_rows(mysqli_query($db,"SELECT * FROM utilisateurs"));

    if($nbr_ligne == 0){
        mysqli_query($db,"ALTER TABLE utilisateurs AUTO_INCREMENT = 1");
    }
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Brasserie La Plateforme | Inscription</title>
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <h1><span class="title">Brasserie <u>La Plateforme</u></span></h1>
        <nav>
            <ul class="nav justify-content-center nav-head">
                <li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fas fa-concierge-bell"></i> | Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-utensils"></i> | Accueil</a></li>
                <li class="nav-item li-bg"><a class="nav-link" href="profil.php"><i class="fas fa-user-circle"></i> | Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="commentaire.php"><i class="fas fa-feather-alt"></i> | Commentaire</a></li>
                <li class="nav-item"><a class="nav-link" href="livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="container-fluid">
            <form class="formulaire" method="post" action="inscription.php"> 
                <section id="ins-text">
                    <h2><span class="title"><u>Inscription</u></span></h2>
                </section>
                <section class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="Votre Login" required> 
                </section>
                <section class="form-group">
                    <label for="password">Mot de Passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe" required>
                </section>
                <section class="form-group">
                    <label for="confirm-password">Confirmez votre Mot de Passe</label>
                    <input type="password" class="form-control" name="confirm-password" placeholder="Confirmez votre Mot de Passe" required>
                </section>
                <button type="submit" name="register" class="btn btn-dark">Rejoignez nous !</button><br>
            </form>
            
            <?php

                if (isset($_POST['register'])) {

                    $login=$_POST['login'];
                    $password=$_POST['password'];
                    $confirm_password=$_POST['confirm-password'];
                    $error_log = '<section class=" alert-css text-center alert alert-danger alert-dismissible fade show">
                    <strong>Mauvais mot de passe !</strong> Les mots de passe ne sont pas identiques.</section>';
                    
                    if($password === $confirm_password){

                        $requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login','$password')";
                        $verification = mysqli_query($db, "SELECT login FROM utilisateurs WHERE login = '".$_POST['login']."'");

                        if(mysqli_num_rows($verification)) {
                            echo("Login \"". $_POST['login'] . "\" est déjà utilisé, veuillez en choisir un autre :-)");
                        }

                        mysqli_query($db,$requete);

                        header('Location: connexion.php');
                        exit();
                        }
                    else{
                        echo($error_log);
                    }
                }   
            ?>

        </section>
    </main>
    <footer>
        <section class="text-center py-4">
            <p><span class='title'>Brasserie La Platefomre</span></p>
        </section>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html