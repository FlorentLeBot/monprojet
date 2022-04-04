<article id="article" class="blog-article">
    <h1 class="blog-article__title" ><?= $params['article']->title ?></h1>
    <p class="blog-article__content"><?= $params['article']->content ?></p>
    <div class="tag">
        <?php foreach($params['article']->getTags() as $tag) : ?>
        <span>
            <?= $tag->name ?>
        </span>
        <?php endforeach ?>
        <img src="<?=$params['article']->img ?? "" ?>" alt="">
    </div>
    <button class="blog-article--btn"><a href="/articles">Revenir sur tous les articles</a></button>
</article>
