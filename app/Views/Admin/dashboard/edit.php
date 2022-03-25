<h1><?= $params['article']->title ?></h1>

<form action="/admin/articles/edit/<?= $params['article']->id ?>">
    <div>
        <label id='title' for="title">Titre de l'article</label>
        <input type="text" name="title" value="<?= $params['article']->title ?>">
    </div>
    <div>
        <textarea name="content" id="content" cols="30" rows="10"><?= $params['article']->content ?></textarea>
    </div>
    <button type="submit">Enregistrer les modifications</button>
</form>

<form action=""></form>