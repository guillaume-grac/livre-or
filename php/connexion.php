<?php

    $db = mysqli_connect('localhost', 'root', '', 'livreor');

    session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Brasserie La Plateforme | Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <h1><span class="title">Brasserie <u>La Plateforme</u></span></h1>
        <nav>
            <ul class="nav justify-content-center nav-head">
                <li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fas fa-signature"></i> | Inscription</a></li>
                <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-utensils"></i> | Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php"><i class="fas fa-user-circle"></i> | Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="commentaire.php"><i class="fas fa-feather-alt"></i> | Commentaire</a></li>
                <li class="nav-item"><a class="nav-link" href="livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php   
            if (isset($_POST['connexion'])){
                $identifiant = ($_POST['login']);
                $password = ($_POST['password']);
                
                $error_log = '<section class="alert alert-danger text-center" role="alert"><b>Veuillez réessayer !</b> Login ou mot de passe incorrect.</section>';
        
                $verification = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'AND password = '".$_POST['password']."'");

                $var = mysqli_fetch_assoc($verification);
                       
                if(mysqli_num_rows($verification)){
        
                    $_SESSION['login'] = $var['login'];
                    $_SESSION['password'] = $var['password'];
                    $_SESSION['id'] = $var['id'];
                    $_SESSION['login'] = $identifiant;
                    $_SESSION['password'] = $password;
                    header('Location: ../index.php');
                }
                else{       
                 echo $error_log;
                }
            }
        ?>
        <section class="container-fluid">
            <form class="formulaire" method="post" action="connexion.php"> 
                <section id="ins-text">
                    <h2><span class="title"><u>Connexion</u></span></h2>
                </section>
                <section class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="Votre Login" required> 
                </section>
                <section class="form-group">
                    <label for="password">Mot de Passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe" required>
                </section>
                <button type="submit" name="connexion" class="btn btn-dark">Connexion</button><br>
            </form>
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