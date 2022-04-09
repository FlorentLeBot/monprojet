<h1 class="title">Jeux de société</h1>

<article>
    <?php foreach ($params['games'] as $game) : ?>
    <h2><?= $game->title ?></h2>
    <p><?= $game->content ?></p>
    <?= $game->getButton() ?>
    <?php endforeach ?>
</article>