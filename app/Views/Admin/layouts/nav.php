<body>
    <div class="global-container">

        <nav id="side-nav">
            <div class="nav-logo">

                <h1>Admin</h1>

                <?php if (isset($_GET['success'])) : ?>
                    <div><p>Vous êtes connecté !</p></div>
                <?php endif ?>
            </div>
            <a href="/monprojet/admin/articles" class="bloc-link">
                <i class="fa-brands fa-dashcube"></i>
                <span class="nav-links">Article</span>
            </a>
            <a href="/monprojet/admin/games" class="bloc-link">
                <i class="fa-solid fa-envelope"></i>
                <span class="nav-links">Fiches jeux</span>
            </a>
            <a href="/monprojet/admin/contact" class="bloc-link">
                <i class="fa-solid fa-database"></i>
                <span class="nav-links">Contact</span>
            </a>
            <?php if (isset($_SESSION['auth'])): ?>
            <a href="/monprojet/logout" class="bloc-link">
                <i class="fa-solid fa-database"></i>
                <span class="nav-links">Se déconnecter</span>
            </a>
            <?php endif ?>


        </nav>