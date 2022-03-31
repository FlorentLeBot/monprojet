<?php

namespace App\Controllers\Admin;

use App\Models\BlogModel;
use App\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\GameModel;
use App\Models\TagModel;

class AdminController extends Controller
{
    // méthode affichage de la page index dans le dashboard administration du blog
    public function index()
    {
        // nouvelle instance de BlogModel affichage de tous les articles
        $articles = (new BlogModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.index', compact('articles'));
    }
    // méthode affichage de la page game administration des fiches pour les jeux de société
    public function game()
    {
        $games = (new GameModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    // méthode affichage de la page contact récupération du formulaire de contact
    public function contact()
    {
        $contact = (new ContactModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }
    // méthode affichage de la page contact récupération du formulaire de contact
    public function image()
    {
        return $this->viewAdmin('admin.dashboard.formImage');
    }

    // méthode permettant d'éditer un article du blog par id
    public function edit(int $id)
    {
        $article = (new BlogModel($this->db))->findById($id);
        $tags = (new TagModel($this->db))->all();

        $res = $this->viewAdmin('admin.dashboard.formBlog', compact('article', 'tags'));
        return $res;
    }

    // méthode permettant la mise à jour d'un article ou d'une fiche jeu de société
    public function update(int $id)
    {

        // var_dump($_POST ); die();
        $article = new BlogModel($this->db);
        // array_pop() dépile et retourne la valeur du dernier élément du tableau array, le raccourcissant d'un élément.
        $tags = array_pop($_POST);

        $res = $article->updateKiss($id, $tags);

        // redirection
        if ($res) {
            return header('Location: /admin/articles');
        }
    }

    // méthode permettant de supprimer 
    public function delete(int $id)
    {
        $article = new BlogModel($this->db);
        $res = $article->delete($id);

        if ($res) {
            return header("Location: /admin/articles");
        }
    }
}
