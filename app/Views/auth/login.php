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

<h1 class="title">Connexion</h1>

<form id="form-login" action="/monprojet/login" method="POST">
    <p>
        <label for="username-login">Nom d'utilisateur</label>
        <input type="text" id="username-login" name="username">
    </p>
    <p>
        <label for="password-login">Mot de passe</label>
        <input type="text" id="password-login" name="password">
    </p>
    <p>
        <button class="btn" type="submit">Se connecter</button>
    </p>
</form>