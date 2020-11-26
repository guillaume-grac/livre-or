<?php

    session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: connexion.php');
        exit();
    }
    
    $db = mysqli_connect ('localhost', 'root', '', 'livreor'); 

    $nbr_ligne = mysqli_num_rows(mysqli_query($db,"SELECT * FROM commentaires"));

    if($nbr_ligne == 0){
        mysqli_query($db,"ALTER TABLE commentaires AUTO_INCREMENT = 1");
    }
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Brasserie La Plateforme | Commentaires</title>
    <link rel="stylesheet" href="../css/commentaire.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <h1><span class="title">Brasserie <u>La Plateforme</u></span></h1>
        <nav>
            <ul class="nav justify-content-center nav-head">
                <li class="nav-item"><a class="nav-link" href="inscription.php"><?php if (!isset($_SESSION['login'])){ echo '<i class="fas fa-signature"></i> | Inscription';}?></a></li>
                <li class="nav-item"><a class="nav-link" href="connexion.php"><?php if (!isset($_SESSION['login'])){ echo '<i class="fas fa-concierge-bell"></i> | Connexion';}?></a></li>
                <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-utensils"></i> | Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php"><i class="fas fa-user-circle"></i> | Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
                <li class="nav-item"><a class="nav-link"><?php if (isset($_SESSION['login'])){ echo '| Bonjour <i class="fas fa-glass-cheers"></i> ' . $_SESSION['login'] . '<li><form method="POST" action="profil.php"><button type="submit" name="logout" title="Déconnexion"  class="btn btn-danger"><i class="fas fa-power-off"></i></button></form></li>';} ?></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php 
            if (isset($_SESSION['login'])){ 
                echo 
                '<section class="container-fluid">
                    <form class="formulaire" method="post" action="commentaire.php"> 
                        <section id="ins-text">
                            <h2><span class="title"><u>Ecrivez nous votre commentaire, il sera ensuite affiché dans le livre d\'or.</u></span></h2>
                        </section>
                        <section class="form-group">
                            <label for="login">Login</label>
                            <textarea class="form-control" name="comment" rows="5">Écrivez votre commentaire ici.</textarea> 
                        </section>
                        <button type="submit" name="envoyer" class="btn btn-dark">Envoyer</button><br>
                    </form>
                </section>';
            }       
               
            else{
                echo '<section class=" alert alert-danger text-center" role="alert">Vous devez être connecté pour poster un commentaire dans le livre d\'or : <a href="connexion.php" class="alert-link">Se connecter</a>.</section>';
            }

            date_default_timezone_set('UTC');

            if (isset($_POST['envoyer'])){
            $comments = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $id_user = $_SESSION['id'];
            $date_comment = date("Y-m-j H:i:s");
            $create_comment = mysqli_query($db,"INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('" . $comments . "', '" . $id_user . "', '" . $date_comment . "')");
            echo mysqli_error($db);

                if ($create_comment){
                    echo "<section class=' alert-css alert alert-success text-center' role='alert'>Le commentaire à bien été <b>Envoyé</b><button type='button'' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>!";
                }
            }
        ?>
    </main>
    <footer>
        <section class="text-center py-4">
            <p><span class='title'>Brasserie La Plateforme</span></p>
        </section>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html