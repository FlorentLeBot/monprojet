<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog</title>
    <!-- cdn font-awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="<?= SCRIPTS . 'Front' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
</head>

<body>
    <header id="header">
        <div class="container">

            <!-- logo et bienvenue -->

            <div class="banner-content">

                <figure>
                    <a href="/monprojet/">
                        <img class="logo" src="../../monprojet/public/front/images/logo-jeux-de-societe.svg"
                            alt="logo dessin de jeu de société">
                    </a>
                </figure>

                <p>Bienvenue</p>
            </div>

            <!-- les boutons des réseaux sociaux -->

            <section id="banner-btn">
                <div class="btn-social-networks"><a href="#facebook"><i class="fab fa-facebook"></i></a></div>
                <div class="btn-social-networks"><a href="#twitter"><i class="fab fa-twitter"></i></a></div>
                <div class="btn-social-networks"><a href="#instagram"><i class="fab fa-instagram"></i></a></div>
            </section>


            <!-- le menu burger  -->
            <div class="menu-wrap">

                <input type="checkbox" class="toggler " />

                <div class="hamburger">
                    <!-- gestion des 3 lignes du burger grace a une div (after et before) -->
                    <div></div>
                </div>
                <div class="menu">
                    <div class="menus">
                        <!-- menu principal -->
                        <nav id="main-menu" >
                            <ul class="container">
                                <li><a title="" href="/monprojet/">Accueil</a></li>
                                <li><a title="" href="/monprojet/games">Jeux de société</a></li>
                                <li><a title="" href="/monprojet/articles">Blog</a></li>
                                <li><a title="" href="/monprojet/contact">Contact</a></li>
                                <li><a href="/monprojet/register">Inscription</a></li>
                                <?php if (isset($_SESSION['username'])) { ?>
                                <li><a href="/monprojet/logout" title="Se deconnecter">Se déconnecter<i
                                            class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a></li>
                                <?php } else { ?>
                                <li><a href="/monprojet/login" title="Se connecter">Se connecter<i
                                             aria-hidden="true"></i>
                                    </a></li>
                                <?php }  ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>