<h1>Les derniers articles</h1>
<!-- index blog -->
<?php foreach ($params['articles'] as $article) : ?>
<h2><?= $article->title ?></h2>
<small><?= $article->getCreatedAt() ?></small>
<div><span>
        Cartes
    </span>
    <span>
        Dés
    </span>
</div>
<p><?= $article->getExcerpt() ?></p>
<?= $article->getButton() ?>
<?php endforeach ?>