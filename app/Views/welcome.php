<h1 class="title">Découvrez nos actualités</h1>

<!-- affichage des 3 derniers jeux -->

<h2>Les derniers jeux</h2>

<section class="flex hover">
    <?php foreach ($params['games'] as $game) : ?>
    <article class="game-welcome">

        <h3><?= $game->title ?></h3>
        <figure>
            <img title="<?= $game->img_name ?>" class="img-game" src="/monprojet/<?= $game->img ?? "" ?>"
                alt="<?= $game->img_name ?>">
        </figure>
        </div>
    </article>
    <?php endforeach ?>
</section>
<!-- ------------------------------------------------------------------------ -->

<!-- affichage des 3 derniers articles -->

<h2>Les derniers articles</h2>
<section class="flex hover">
    <?php foreach ($params['articles'] as $article) : ?>
    <article class="article-welcome">
        <h3><?= $article->title ?></h3>
        <figure>
            <img title="<?= $article->img_name ?>" class="img-article" src="/monprojet/<?= $article->img ?? "" ?>"
                alt="<?= $article->img_name ?>">
        </figure>

    </article>
    <?php endforeach ?>
</section>