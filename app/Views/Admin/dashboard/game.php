<div class="input-control">
    <label for="search">
        <i class="fa-solid fa-magnifying-glass"></i>
    </label>
    <input type="text" onkeyup="search()" name="search" id="search" placeholder="chercher" />
</div>

<h2 class="main-title">Création et Edition d'une fiche de jeu</h2>

<button><a href="/monprojet/admin/games/create">Créer une fiche</a></button>

<div class="table">
    <h3 class="table-title">Id</h3>
    <h3 class="table-title">Titre</h3>
    <h3 class="table-title">Publié le</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach ($params['games'] as $game) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="game-id"><?= $game->id ?></li>
        <li class="game-title"><?= $game->title ?></li>
        <li class="game-created-at"><?= $game->getCreatedAt() ?></li>
        <li>
            <button><a href="/monprojet/admin/games/edit/<?= $game->id ?>">Modifier</a></button>
            <form action="/monprojet/admin/games/delete/<?= $game->id ?>" method="post">
                <button type="submit">Supprimer</button>
            </form>
            
        </li>
    </ul>
</div>

<?php endforeach ?>