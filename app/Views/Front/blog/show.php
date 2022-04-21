<section class="blog-article">
    <article id="blog-article">
        <div>

            <h1 class="title"><?= $params['article']->title ?></h1>

            <figure>
                <img title="<?= $params['article']->img_name ?>" class="blog-img"
                    src="/monprojet/<?=$params['article']->img ?? "" ?>" alt="<?= $params['article']->img_name ?>">
            </figure>

        </div>
        <div class="container-article">

            <p class=""><?= $params['article']->content ?></p>

            <!-- <div class="tags">
                <?php foreach($params['article']->getTags() as $tag) : ?>
                <span class="tag">
                    <?= $tag->name ?>
                </span>
                <?php endforeach ?>
            </div> -->

            <button class="btn "><a href="/monprojet/articles">Tous les articles</a></button>
        </div>

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