<article class="game">
    <h1 class="game__title"><?= $params['game']->title ?></h1>
    <figure>
        <img src="<?=$params['game']->img ?? "" ?>" alt="">
    </figure>
    <p class="game__content"><?= $params['game']->content ?></p>
    <div class="category">
        <?php foreach($params['game']->getCategories() as $category) : ?>
        <span>
            <?= $category->name ?>
        </span>
        <?php endforeach ?>
    </div>
   
    <button class="btn"><a href="/monprojet/games">Tous les jeux</a></button>
</article>