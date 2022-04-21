<?php

namespace App\Controllers\Admin;

use App\Models\TagModel;
use App\Models\BlogModel;
use App\Models\GameModel;
use App\Models\ContactModel;
use App\Models\CategoryModel;
use App\Controllers\Controller;

/* Sommaire des méthodes:
- article
- game
- contact
- createTag
- createCategory
- createArticle
- createGame
- editArticle
- editGame
*/

class AdminController extends Controller
{
    /* LES VUES */

    // -----------------------------------------------------------------------------------------------------

    public function article()
    {
        $this->isAdmin();
        // nouvelle instance de BlogModel affichage de tous les articles
        $articles = (new BlogModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.article', compact('articles'));
    }
    // affichage de la page game administration des fiches pour les jeux de société
    public function game()
    {
        $this->isAdmin();
        $games = (new GameModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    // affichage de la page contact récupération du formulaire de contact
    public function contact()
    {
        $this->isAdmin();
        $contact = (new ContactModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }

    // -----------------------------------------------------------------------------------------------------

    public function createTag()
    {
        $this->isAdmin();
        $tags = (new TagModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formBlog', compact('tags'));
    }

    public function createCategory()
    {
        $this->isAdmin();
        $categories = (new CategoryModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formGame', compact('categories'));
    }

    // -------------------------------------------------------------------------------------------------------------------

    // CREER

    public function createArticle()
    {
        $this->isAdmin();
        $article = new BlogModel($this->db);
        if (isset($_POST['tags'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $tags = array_pop($_POST);
            $res = $article->create($_POST, $tags);
            return header('Location: /monprojet/admin/articles');
        } else {
            $res = $article->create($_POST);
            return header('Location: /monprojet/admin/articles');
        }
    }

    public function createGame()
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        if (isset($_POST['categories'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $categories = array_pop($_POST);
            $res = $game->create($_POST, $categories);
            return header('Location: /monprojet/admin/articles');
        } else {
            $res = $game->create($_POST);
            return header('Location: /monprojet/admin/articles');
        }
    }

    // -------------------------------------------------------------------------------------------------------------------

    // EDITER

    public function editArticle(int $id)
    {
        $this->isAdmin();
        $article = (new BlogModel($this->db))->findById($id);
        $tags = (new TagModel($this->db))->all();
        $res = $this->viewAdmin('admin.dashboard.formBlog', compact('article', 'tags'));
        return $res;
    }

    public function editGame(int $id)
    {
        $this->isAdmin();
        $game = (new GameModel($this->db))->findById($id);
        $categories = (new CategoryModel($this->db))->all();
        $res = $this->viewAdmin('admin.dashboard.formGame', compact('game', 'categories'));
        return $res;
    }

    // -------------------------------------------------------------------------------------------------------------------

    // METTRE A JOUR

    public function updateArticle(int $id)
    {
        $this->isAdmin();
        $article = new BlogModel($this->db);
        // array_pop() dépile et retourne la valeur du dernier élément du tableau array, le raccourcissant d'un élément.
        $tags = array_pop($_POST);
        $res = $article->updateKiss($id, $tags);
        // redirection
        if ($res) {
            return header('Location: /monprojet/admin/articles');
        }
    }
    public function updateGame(int $id)
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        $categories = array_pop($_POST);
        $res = $game->updateKiss($id, $categories);
        // redirection
        if ($res) {
            return header('Location: /monprojet/admin/games');
        }
    }

    // -------------------------------------------------------------------------------------------------------------------

    /* SUPPRIMER */

    public function deleteArticle(int $id)
    {
        $this->isAdmin();
        $article = new BlogModel($this->db);
        $res = $article->delete($id);
        if ($res) {
            return header("Location: /monprojet/admin/articles");
        }
    }

    public function deleteGame(int $id)
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        $res = $game->delete($id);
        if ($res) {
            return header("Location: /monprojet/admin/games");
        }
    }
}
// -------------------------------------------------------------------------------------------------------------------