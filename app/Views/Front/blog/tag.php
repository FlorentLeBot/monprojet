<h1 class="tag-title"><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getArticles() as $article) : ?>

<article>
    <a href="/articles/<?= $article->id ?>"><?= $article->title ?></a>
    <p><?= $article->content ?></p>
    <img src="<?=$article->img ?? "" ?>" alt="">
</article>

<?php endforeach ?>