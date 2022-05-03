<h2><?= $params['game']->title ??  'Créer une nouvelle fiche' ?></h2>

<form id="form-game" enctype="multipart/form-data" method="POST"
    action="<?= isset($params['game']) ? "/monprojet/admin/games/edit/{$params['game']->id}" : "/monprojet/admin/games/create" ?>">
    <!-- TITRE -->
    <p>
        <label for="title-game">Nom du jeu</label>
        <input required="required" id='title-game' type="text" name="title" value="<?= $params['game']->title ?? '' ?>">
    </p>
    <!-- CONTENU -->
    <p>
        <label for="content-game">Descriptif</label>
        <textarea required="required" name="content" id="content-game" cols="30" rows="8"><?= $params['game']->content ?? ' ' ?></textarea>
    </p>
    <!-- IMAGE -->
    <p>
        <label for="img-game">Ajouter une image</label>
        <input required="required" type="file" name="img" id="img-game">
    </p>
    <p>
        <img src="../../..><?=$params['game']->img ?? "" ?>" alt="">
    </p>
    <!-- CATEGORIE -->
    <p>
        <label for="categories">Catégories</label>
        <select multiple name="categories[]" id="categories">
            <?php foreach ($params['categories'] as $category) : ?>
            <option value="<?= $category->id ?>" <?php if (isset($params['game'])) : ?> <?php foreach ($params['game']->getCategories() as $gameCategory) {
                    echo ($category->id === $gameCategory->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </p>
    <!-- VALIDATION -->
    <p>
        <button
            type="submit"><?= isset($params['game']) ?  'Enregister les modifications' : 'Enregistrer mon jeu'?></button>
    </p>
</form>