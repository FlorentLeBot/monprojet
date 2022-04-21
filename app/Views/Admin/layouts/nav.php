<body>
    <div class="global-container">

        <nav id="side-nav">
            <div class="nav-logo">
                <h1>Admin</h1>
            </div>
            <?php if (isset($_GET['success'])) : ?>
            <p>Vous êtes connecté !</p>
            <?php endif ?>
            <div class="bloc-links">
                <a href="/monprojet/admin/articles" class="bloc-link">
                    <i class="fa-solid fa-database"></i>
                    <span class="nav-links">Article</span>
                </a>
                <a href="/monprojet/admin/games" class="bloc-link">
                    <i class="fa-solid fa-database"></i>
                    <span class="nav-links">Fiches jeux</span>
                </a>
                <a href="/monprojet/admin/contact" class="bloc-link">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="nav-links">Contact</span>
                </a>
                <?php if (isset($_SESSION['auth'])): ?>
                <a href="/monprojet/logout" class="bloc-link">
                    <span class="nav-links">Se déconnecter</span>
                </a>
            </div>
            <?php endif ?>
        </nav>