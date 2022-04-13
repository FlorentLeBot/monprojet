<h1 class="title" >Bienvenue</h1>

<!-- affichage des 3 derniers jeux -->

<h2>Les derniers jeux</h2>

<?php foreach ($params['games'] as $game) : ?>
<article class="article-welcome">
    <h3><?= $game->title ?></h3>
    <p><?= $game->content ?></p>
</article>
<?php endforeach ?>

<!-- ------------------------------------------------------------------------ -->

<!-- affichage des 3 derniers articles -->

<h2>Les derniers articles</h2>

<?php foreach ($params['articles'] as $article) : ?>
<article class="article-welcome">
    <h3><?= $article->title ?></h3>
    <p><?= $article->content ?></p>      
</article>
<?php endforeach ?>