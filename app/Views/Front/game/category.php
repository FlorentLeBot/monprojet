<h1 class="category-title"><?= $params['category']->name ?></h1>

<?php foreach ($params['category']->getGames() as $game) : ?>

<article>
    <a href="/monprojet/games/<?= $game->id ?>"><?= $game->title ?></a>
    <p><?= $game->content ?></p>
    <img src="<?=$game->img ?? "" ?>" alt="">
</article>

<?php endforeach ?>