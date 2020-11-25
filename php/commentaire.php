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
                <li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fas fa-signature"></i> | Inscription</a></li>
                <li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fas fa-concierge-bell"></i> | Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-utensils"></i> | Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php"><i class="fas fa-user-circle"></i> | Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
            </ul>
        </nav>
    </header>
    <main>
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