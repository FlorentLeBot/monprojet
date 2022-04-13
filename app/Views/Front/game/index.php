<h1 class="title">Jeux de société</h1>

<?php foreach ($params['games'] as $game) : ?>
    <article id="games">
        <h2><?= $game->title ?></h2>
        <figure>
            <img title="<?= $game->img_name ?>" class="img-game" src="/monprojet/<?= $game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>
        <?= $game->getButton() ?>
    </article>
<?php endforeach ?>