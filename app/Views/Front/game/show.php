<article id="game">
    <h1 class="title"><?= $params['game']->title ?></h1>
    <figure>
        <img title="<?= $params['game']->img_name ?>" class="img-game" src="/monprojet/<?=$params['game']->img ?? "" ?>" alt="<?= $params['game']->img_name ?>">
    </figure>
    <p class=""><?= $params['game']->content ?></p>
    <div class="category">
        <?php foreach($params['game']->getCategories() as $category) : ?>
        <span>
            <?= $category->name ?>
        </span>
        <?php endforeach ?>
    </div>
   
    <button class="btn"><a href="/monprojet/games">Tous les jeux</a></button>
</article>

