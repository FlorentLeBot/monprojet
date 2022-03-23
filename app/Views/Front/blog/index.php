<h1>Les derniers articles</h1>

<?php foreach ($params['articles'] as $article) : ?>
    <h2><?= $article->title ?></h2>
    <small><?= $article->created_at ?></small>
    <p><?= $article->content ?></p>
    <a href="/articles/<?= $article->id ?>">Lire plus</a>
<?php endforeach ?>
