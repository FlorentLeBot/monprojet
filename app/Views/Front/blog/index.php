<section id="blog-articles">
    <h1 class="title">Les derniers articles</h1>

    <?php foreach ($params['articles'] as $article) : ?>
    <article class="blog-articles">

        <h2 class="title-h2"><?= $article->title ?></h2>

        <figure>
            <img title="<?= $article->img_name ?>" class="blog-img" src="/monprojet/<?=$article->img ?? "" ?>"
                alt="<?= $article->img_name ?>">
        </figure>


        <div class="tags">
            <?php foreach($article->getTags() as $tag) : ?>
            <span class="tag">
                <a href="/monprojet/tags/<?= $tag->id ?>"><?= $tag->name ?></a>
            </span>
            <?php endforeach ?>
        </div>
        <div>
            <p><?= $article->getExcerpt() ?></p>
            <?= $article->getButton() ?>
        </div>
        <small class="published"><?= $article->getCreatedAt() ?></small>

    </article>

    <?php endforeach ?>
</section>