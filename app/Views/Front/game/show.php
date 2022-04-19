<section class="game">

    <article id="game">
        <div>
            <h1 class="title"><?= $params['game']->title ?></h1>

            <figure>
                <img title="<?= $params['game']->img_name ?>" class="img-game"
                    src="/monprojet/<?=$params['game']->img ?? "" ?>" alt="<?= $params['game']->img_name ?>">
            </figure>
        </div>
        <div>
            <p class=""><?= $params['game']->content ?></p>

            <button class="btn"><a href="/monprojet/games">Tous les jeux</a></button>
        </div>
    </article>

</section>