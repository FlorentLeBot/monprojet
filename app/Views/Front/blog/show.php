<article id="article" class="blog-article">
    <h1 class="title"><?= $params['article']->title ?></h1>

    <figure>
        <img class="blog-img" src="/monprojet/<?=$params['article']->img ?? "" ?>" alt="">
    </figure>
    <div class="container-article">
        <div class="tags">
            <?php foreach($params['article']->getTags() as $tag) : ?>
            <span class="tag">
                <?= $tag->name ?>
            </span>
            <?php endforeach ?>

        </div>
        <p class="blog-article__content"><?= $params['article']->content ?></p>

        <button class="btn "><a href="/monprojet/articles">Tous les articles</a></button>
    </div>
</article>