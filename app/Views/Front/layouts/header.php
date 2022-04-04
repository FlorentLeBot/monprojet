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
    <header class="header ">

        <img src="" alt="">

        <!-- le menu burger  -->

        <div class="menu-wrap">

            <input type="checkbox" class="toggler " />

            <div class="hamburger">
                <!-- gestion des 3 lignes de l'hamburger grace a une div -->
                <div></div>
            </div>

            <!-- le menu -->

            <div class="menu">

                <div class="menus container">

                    <!-- menu principal -->

                    <nav id="main-menu">
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li><a href="/games">Jeux de société</a></li>
                            <li><a href="/articles">Blog</a></li>
                            <li><a href="/contact">Contact</a></li>

                        </ul>
                    </nav>

                    <!-- menu php -->

                    <nav id="register-menu">
                        <ul>
                            <li><a href="/register">Inscription</a></li>
                            <li><a href="/login" title="Se connecter">Se connecter<i class="fa fa-user-circle"
                                        aria-hidden="true"></i>
                                </a></li>
                            <li><a href="/logout" title="Se deconnecter">Se déconnecter<i class="fa fa-user-circle"
                                        aria-hidden="true"></i>
                                </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>



    </header>