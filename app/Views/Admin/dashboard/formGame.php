<h1><?= $params['game']->title ??  'Créer une nouvelle fiche' ?></h1>

<form enctype="multipart/form-data" method="POST"
    action="<?= isset($params['game']) ? "/monprojet/admin/games/edit/{$params['game']->id}" : "/monprojet/admin/games/create" ?>">
    <!-- TITRE -->
    <div>
        <label for="title-game">Nom du jeu</label>
        <input id='title-game' type="text" name="title" value="<?= $params['game']->title ?? '' ?>">
    </div>
    <!-- CONTENU -->
    <div>
        <label for="content-game">Descriptif</label>
        <textarea name="content" id="content-game" cols="30" rows="8"><?= $params['game']->content ?? ' ' ?></textarea>
    </div>
    <!-- IMAGE -->
    <div>
        <label for="img-game">Ajouter une image</label>
        <input type="file" name="img" id="img-game">
    </div>
    <div>
        <img src="../../..><?=$params['game']->img ?? "" ?>" alt="">
    </div>
    <!-- TAG -->
    <div>
        <label for="categories">Catégories</label>
        <select multiple name="categories[]" id="categories">
        <?php foreach ($params['categories'] as $category) : ?>
            <option value="<?= $category->id ?>" <?php if (isset($params['game'])) : ?> <?php foreach ($params['game']->getCategories() as $gameCategory) {
                    echo ($category->id === $gameCategory->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <!-- VALIDATION -->

    <button
        type="submit"><?= isset($params['game']) ?  'Enregister les modifications' : 'Enregistrer mon jeu'?></button>

</form>