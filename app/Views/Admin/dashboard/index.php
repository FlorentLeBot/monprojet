<div class="input-control">
    <label for="search">
        <i class="fa-solid fa-magnifying-glass"></i>
    </label>
    <input type="text" onkeyup="search()" name="search" id="search" placeholder="chercher" />
</div>

<h2 class="main-title">Database</h2>
<div class="table">
    <h3 class="table-title">Id</h3>
    <h3 class="table-title">Titre</h3>
    <h3 class="table-title">Publié le</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach ($params['articles'] as $article) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="article-id"><?= $article->id ?></li>
        <li class="article-title"><?= $article->title ?></li>
        <li class="article-created-at"><?= $article->getCreatedAt() ?></li>
        <li>
            <button><a href="/admin/articles/edit/<?= $article->id ?>">Modifier</a></button>
            
            <form action="/admin/articles/delete/<?= $article->id ?>" method="post">
                <button type="submit">Supprimer</button>
            </form>
        </li>
    </ul>
</div>

<?php endforeach ?>