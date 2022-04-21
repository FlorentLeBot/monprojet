<h1 class="title">Découvrez nos actualités</h1>

<section class="flex hover">
    <h2>Les derniers jeux</h2>
    <?php foreach ($params['games'] as $game) : ?>
    <article class="game-welcome">
        <h3><?= $game->title ?></h3>
        <figure>
            <img class="img-game" src="/monprojet/<?= $game->img ?? "" ?>"
                alt="<?= $game->img_name ?>">
        </figure>
    </article>
    <?php endforeach ?>
</section>

<!-- affichage des 3 derniers articles -->

<section class="flex hover">
    <h2>Les derniers articles</h2>
    <?php foreach ($params['articles'] as $article) : ?>
    <article class="article-welcome">
        <h3><?= $article->title ?></h3>
        <figure>
            <img class="img-article" src="/monprojet/<?= $article->img ?? "" ?>"
                alt="<?= $article->img_name ?>">
        </figure>
    </article>
    <?php endforeach ?>
</section>