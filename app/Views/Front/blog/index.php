<h1 class="title">Les derniers articles</h1>

<?php foreach ($params['articles'] as $article) : ?>
<article class="blog-articles ">
    <h2 class="title-h2"><?= $article->title ?></h2>
    <hr>
    <div class="tags">
        <?php foreach($article->getTags() as $tag) : ?>
        <span class="tag">
            <a href="/monprojet/tags/<?= $tag->id ?>"><?= $tag->name ?></a>
        </span>
        <?php endforeach ?>
    </div>
    <div>
        <p class="blog-articles__excerpt"><?= $article->getExcerpt() ?></p>
        <?= $article->getButton() ?>
    </div>
    <small class="published"><?= $article->getCreatedAt() ?></small>
</article>

<!-- Commentaire -->

<?php if(isset($_SESSION['id'])) : ?>

<form id="form-comment" action="/monprojet/comment" method="POST">
    <div>
        <label for="comment">Ecrire un commentaire</label>
        <textarea name="content" id="comment" cols="20" rows="6" placeholder="Commentaire"></textarea>
        <input class="btn" type="submit">
    </div>
</form>

<?php endif ?>
<?php endforeach ?>