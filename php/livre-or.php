<?php

$db = mysqli_connect ('localhost', 'root', '', 'livreor');

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
    <title>Brasserie La Plateforme | Livre d'Or</title>
    <link rel="stylesheet" href="../css/livre-or.css">
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
                <li class="nav-item"><a class="nav-link" href="commentaire.php"><i class="fas fa-feather-alt"></i> | Commentaire</a></li>
                <li class="nav-item"><a class="nav-link"><?php if (isset($_SESSION['login'])){ echo '| Bonjour <i class="fas fa-glass-cheers"></i> ' . $_SESSION['login'] . '<li><form method="POST" action="profil.php"><button type="submit" name="logout" title="Déconnexion"  class="btn btn-danger"><i class="fas fa-power-off"></i></button></form></li>';} ?></a></li>
            </ul>
        </nav>
    </header>
    <main>

    <?php
 
        /* requette qui selectionne le login de utilisateur (u.), la date de commentaires, (c.) et de joindre les tables commentaires et utilisateurs en triant du plus récent au plus vieux */
        $check_comments = mysqli_query($db,"SELECT u.login, c.date, c.commentaire FROM utilisateurs AS u INNER JOIN commentaires AS c WHERE c.id_utilisateur = u.id ORDER BY c.date DESC");

        while($comments_list = mysqli_fetch_assoc($check_comments)){
            echo "<table><tr><td>Posté le<b> " . htmlspecialchars($comments_list['date']) . " </b>par <i><b><span class='nom-com'>" . htmlspecialchars($comments_list['login']) . "</b></i></td></tr><br /><tr><td>" . htmlspecialchars($comments_list['commentaire']) . "</td></tr></table>";
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