<h1><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getArticles() as $article) : ?>

<div>
    <a href="/articles/<?= $article->id ?>"><?= $article->title ?></a>
</div>

<?php endforeach ?>