<section class="blog-article">
    <article id="blog-article">

        <h1 class="title-article"><?= $params['article']->title ?></h1>

        <figure class="img-article">
            <img title="<?= $params['article']->img_name ?>" "
                    src="/monprojet/<?=$params['article']->img ?? "" ?>" alt="<?= $params['article']->img_name ?>">
        </figure>

        <div class="container-article">

            <p class="content-article"><?= $params['article']->content ?></p>

        </div>
        <button class="btn btn-article"><a href="/monprojet/articles">Tous les articles</a></button>

    </article>
</section>
<!-- Commentaire -->

<?php if(isset($_SESSION['id'])) : ?>

<form id="form-comment" action="/monprojet/comment" method="POST">
    <div>
        <label for="comment">Ecrire un commentaire</label>
        <textarea name="content" id="comment" cols="20" rows="6" placeholder="Commentaire"></textarea>
        <input type="hidden" value="<?= $params['article']->id ?>" name="id_article">
        <input class="btn" type="submit">
    </div>
</form>

<?php endif ?>