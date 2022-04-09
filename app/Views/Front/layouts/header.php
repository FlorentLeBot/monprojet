<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog</title>
    <link rel="stylesheet"
        href="<?= SCRIPTS . 'Front' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
</head>

<body>
    <header class="header">
        <div class="container">
            <figure>
                <img class="logo" src="../../monprojet/public/front/images/logo-jeux-de-societe.svg"
                    alt="logo dessin de jeu de société">
            </figure>
            <!-- le menu burger  -->

            <div class="menu-wrap">

                <input type="checkbox" class="toggler " />

                <div class="hamburger">
                    <!-- gestion des 3 lignes du burger grace a une div (after et before) -->
                    <div></div>
                </div>

                <!-- le menu -->

                <div class="menu">

                    <div class="menus container">

                        <!-- menu principal -->

                        <nav id="main-menu">
                            <ul>
                                <li><a title="" href="/monprojet/">Accueil</a></li>
                                <li><a title="" href="/monprojet/games">Jeux de société</a></li>
                                <li><a title="" href="/monprojet/articles">Blog</a></li>
                                <li><a title="" href="/monprojet/contact">Contact</a></li>

                            </ul>
                        </nav>

                        <!-- menu php -->

                        <nav id="register-menu">
                            <ul>
                                <li><a href="/monprojet/register">Inscription</a></li>
                                <li><a href="/monprojet/login" title="Se connecter">Se connecter<i
                                            class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a></li>
                                <li><a href="/monprojet/logout" title="Se deconnecter">Se déconnecter<i
                                            class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>