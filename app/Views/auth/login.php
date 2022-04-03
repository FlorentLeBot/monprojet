<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
        <?php foreach ($errorsArray as $errors) : ?>
            <div>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>
<?php endif ?>



<!-- supprimer les erreurs en session -->
<?php session_destroy() ?>

<h1>Connexion</h1>

<form action="/login" method="POST">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">
    </div>
    <div>
        <button type="submit">Se connecter</button>
    </div>
</form>