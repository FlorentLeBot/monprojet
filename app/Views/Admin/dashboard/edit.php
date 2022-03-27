<h1>Modifier : <?= $params['article']->title ?></h1>

<form enctype="multipart/form-data" method="POST" action="/admin/articles/edit/<?= $params['article']->id ?>">
    <div>
        <label for="title">Titre de l'article</label>
        <input id='title' type="text" name="title" value="<?= $params['article']->title ?>">
    </div>
    <div>
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="8"><?= $params['article']->content ?></textarea>
    </div>

    <div>
        <label for="file">Fichier</label>
        <input type="file" name="img">
    </div>

    <div>
        <label for="tags">Tags de l'article</label>
        <select multiple name="tags[]" id="tags">
            <?php foreach ($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>" <?php if (isset($params['article'])) : ?> 
                    <?php foreach ($params['article']->getTags() as $articleTag) {
                        echo ($tag->id === $articleTag->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div>


    <button type="submit">Enregistrer les modifications</a></button>
    <div>
        <?= $params['article']->img ?>
    </div>
</form>