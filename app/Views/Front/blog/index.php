<h1>Les derniers articles</h1>

<?php foreach ($params['articles'] as $article) : ?>
<h2><?= $article->title ?></h2>
<small><?= $article->getCreatedAt() ?></small>
<div>
    <?php foreach($article->getTags() as $tag) : ?>
    <span>
        <?= $tag->name ?>
    </span>
    <?php endforeach ?>
</div>
<p><?= $article->getExcerpt() ?></p>
<?= $article->getButton() ?>
<?php endforeach ?>