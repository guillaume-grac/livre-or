<?php

    session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: connexion.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Brasserie La Plateforme | Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <h1><span class="title">Brasserie <u>La Plateforme</u></span></h1>
        <nav>
            <ul class="nav justify-content-center nav-head">
                
                <li class="nav-item li-bg"><a class="nav-link" href="inscription.php"><?php if (!isset($_SESSION['login'])){ echo '<i class="fas fa-signature"></i> | Inscription';}?></a></li>
                <li class="nav-item li-bg"><a class="nav-link" href="connexion.php"><?php if (!isset($_SESSION['login'])){ echo '<i class="fas fa-concierge-bell"></i> | Connexion';}?></a></li>
                <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-utensils"></i> | Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="commentaire.php"><i class="fas fa-feather-alt"></i> | Commentaire</a></li>
                <li class="nav-item"><a class="nav-link" href="livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
                <li class="nav-item"><a class="nav-link"><?php if (isset($_SESSION['login'])){ echo '| Bonjour <i class="fas fa-glass-cheers"></i> ' . $_SESSION['login'] . '<li><form method="POST" action="profil.php"><button type="submit" name="logout" title="Déconnexion"  class="btn btn-danger"><i class="fas fa-power-off"></i></button></form></li>';} ?></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php 

            $db = mysqli_connect('localhost', 'root', '', 'livreor');
            if (isset($_SESSION['login'])){ 
                if(isset($_POST['update'])){
                    if(isset($_POST['Nlogin']) && $_POST['Npassword'] === $_POST['NCpassword']){

                        $login=$_POST['Nlogin'];
                        $password=$_POST['Npassword'];
                        $confirmpassword=$_POST['NCpassword'];
                        $id=$_SESSION['id'];                  

                        $update = mysqli_query($db, "UPDATE utilisateurs SET login = '$login', password = '$password' WHERE id = $id");

                        $_SESSION['login']=$login;
                        $_SESSION['password']=$password;
                        $_SESSION['id']=$id;
                        $modif = '<p class="alert alert-success text-center" role="alert"><b>Modification réussie</b></p>';

                        if($update){
                            echo $modif;
                        }
                    }

                    if($_POST['Npassword'] != $_POST['NCpassword']){
                        echo '<p class="alert alert-danger text-center" role="alert"><b>Echec</b> Mauvais mot de passe</p>';
                    }
                }
            } 

            if (isset($_SESSION['login'])){ 
                echo 
                '<section class="container-fluid">
                    <form class="formulaire" method="post" action="inscription.php"> 
                        <section id="ins-text">
                            <h2><span class="title"><u>Modifier votre Profil</u></span></h2>
                        </section>
                        <section class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="Nlogin" placeholder="Votre nouveau Login"  required> 
                        </section>
                        <section class="form-group">
                            <label for="password">Mot de Passe</label>
                            <input type="password" class="form-control" name="Npassword" placeholder="Votre nouveau Mot de Passe" required>
                        </section>
                        <section class="form-group">
                            <label for="confirm-password">Confirmez votre Mot de Passe</label>
                            <input type="password" class="form-control" name="NCpassword" placeholder="Confirmez votre nouveau Mot de Passe" required>
                        </section>
                        <button type="submit" name="update" class="btn btn-dark">Rejoignez nous !</button><br>
                    </form>
                </section>';
            }       
               
            else{
                echo '<section class="alert alert-danger text-center" role="alert">Vous devez être connecté pour voir votre Profil : <a href="connexion.php" class="alert-link">Se connecter</a>.</section>';
            }
        ?>
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