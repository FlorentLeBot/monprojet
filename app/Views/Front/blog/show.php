
<h1><?= $params['article']->title ?></h1>
<p><?= $params['article']->content ?></p>
<div>
    <?php foreach($params['article']->getTags() as $tag) : ?>
    <span>
        <?= $tag->name ?>
    </span>
    <?php endforeach ?>
</div>
<button><a href="/articles">Revenir sur tous les articles</a></button>