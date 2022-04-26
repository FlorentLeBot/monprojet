<!-- <div class="play-game">
    <h3>0</h3>
</div> -->

<h1 class="title">Jeux de société</h1>
<div id="games">

    <?php foreach ($params['games'] as $game) : ?>

    <article class="games">

        <h2><?= $game->title ?></h2>
        <figure>
            <img class="img-game" src="/monprojet/<?= $game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>

        <div class="categories">
            <?php foreach($game->getCategories() as $category) : ?>

            <p class="category">
                <a href="/monprojet/category/<?= $category->id ?>"><?= $category->name ?></a>
            </p>
            <?php endforeach ?>
        </div>

        <?= $game->getButton() ?>
    </article>
    <?php endforeach ?>
</div>