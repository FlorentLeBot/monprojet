<h1><?= $params['article']->title ??  'Créer un nouvel article ' ?></h1>

<form enctype="multipart/form-data" method="POST"
    action="<?= isset($params['article']) ? "/monprojet/admin/articles/edit/{$params['article']->id}" : "/monprojet/admin/articles/create" ?>">
    <!-- TITRE -->
    <div>
        <label for="title-article">Titre de l'article</label>
        <input id='title-article' type="text" name="title" value="<?= $params['article']->title ?? '' ?>">
    </div>
    <!-- CONTENU -->
    <div>
        <label for="content-article">Contenu de l'article</label>
        <textarea name="content" id="content-article" cols="30" rows="8"><?= $params['article']->content ?? ' ' ?></textarea>
    </div>
    <!-- IMAGE -->
    <div>
        <label for="img-article">Ajouter une image</label>
        <input type="file" name="img" id="img-article">
    </div>
    <!-- <div>
        <img src="../../..><?=$params['article']->img ?? "" ?>">
    </div> -->
    <!-- NOM DE L'IMAGE -->
    <div>
        <label for="img-name-article">Donner un nom à l'image</label>
        <input type="text" name="img_name" id="img-name-article">
    </div>
    
    <!-- TAG -->
    <div>
        <label for="tags">Tags de l'article</label>
        <select multiple name="tags[]" id="tags">
            <?php foreach ($params['tags'] as $tag) : ?>
            <option value="<?= $tag->id ?>" <?php if (isset($params['article'])) : ?> <?php foreach ($params['article']->getTags() as $articleTag) {
                    echo ($tag->id === $articleTag->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <!-- VALIDATION -->
    <button
        type="submit"><?= isset($params['article']) ?  'Enregister les modifications' : 'Enregistrer mon article'?></button>

</form>