<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Brasserie La Plateforme | Accueil</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <h1><span class="title">Brasserie <u>La Plateforme</u></span></h1>
        <nav>
            <ul class="nav justify-content-center nav-head">
                <li class="nav-item"><a class="nav-link" href="php/inscription.php"><i class="fas fa-signature"></i> | Inscription</a></li>
                <li class="nav-item"><a class="nav-link" href="php/connexion.php"><i class="fas fa-concierge-bell"></i> | Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="php/profil.php"><i class="fas fa-user-circle"></i> | Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="php/commentaire.php"><i class="fas fa-feather-alt"></i> | Commentaire</a></li>
                <li class="nav-item"><a class="nav-link" href="php/livre-or.php"><i class="fas fa-book-open"></i> | Livre d'Or</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
            </ol>
            <section class="carousel-inner" role="listbox">
                <section class="carousel-item active">
                    <img class="d-block w-100" src="images/bg1.jpg" alt="First slide">
                </section>
                <section class="carousel-item">
                    <img class="d-block w-100" src="images/bg2.jpg" alt="Second slide">
                </section>
                <section class="carousel-item">
                    <img class="d-block w-100" src="images/bg3.jpg" alt="Third slide">
                </section>
            </section>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
</html>