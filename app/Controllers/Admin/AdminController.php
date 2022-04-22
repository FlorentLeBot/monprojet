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
- deleteArticle
- deleteGame
- deleteMessage
*/

class AdminController extends Controller
{
    /* LES VUES */

    // -----------------------------------------------------------------------------------------------------

    public function article(): void
    {
        $this->isAdmin();
        // nouvelle instance de BlogModel affichage de tous les articles
        $articles = (new BlogModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.article', compact('articles'));
    }
    // affichage de la page game administration des fiches pour les jeux de société
    public function game(): void
    {
        $this->isAdmin();
        $games = (new GameModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    // affichage de la page contact récupération du formulaire de contact
    public function contact(): void
    {
        $this->isAdmin();
        $contact = (new ContactModel($this->db))->getMail();
        // var_dump($contact); die();
        $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }
    public function readMessage(int $id): void
    {
        $this->isAdmin();
        $msg = (new ContactModel($this->db))->findById($id);
        $this->viewAdmin('admin.dashboard.read', compact('msg'));
    }

    // -----------------------------------------------------------------------------------------------------

    public function createTag(): void
    {
        $this->isAdmin();
        $tags = (new TagModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.formBlog', compact('tags'));
    }
    public function createCategory(): void
    {
        $this->isAdmin();
        $categories = (new CategoryModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.formGame', compact('categories'));
    }

    // -------------------------------------------------------------------------------------------------------------------

    // CREER

    public function createArticle(): void
    {
        $this->isAdmin();
        $article = new BlogModel($this->db);
        if (isset($_POST['tags'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $tags = array_pop($_POST);
            $res = $article->create($_POST, $tags);
            header('Location: /monprojet/admin/articles');
        } else {
            $res = $article->create($_POST);
            header('Location: /monprojet/admin/articles');
        }
    }
    public function createGame(): void
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        if (isset($_POST['categories'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $categories = array_pop($_POST);
            $res = $game->create($_POST, $categories);
            header('Location: /monprojet/admin/articles');
        } else {
            $res = $game->create($_POST);
            header('Location: /monprojet/admin/articles');
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
        var_dump(gettype($res)); die;
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
        $res = $article->updateArticle($id, $tags);
        // redirection
        if ($res) {
            header('Location: /monprojet/admin/articles');
        }
    }
    public function updateGame(int $id) : void
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        $categories = array_pop($_POST);
        $res = $game->updateGame($id, $categories);
        // redirection
        if ($res) {
            header('Location: /monprojet/admin/games');
        }
    }

    // -------------------------------------------------------------------------------------------------------------------

    /* SUPPRIMER */

    public function deleteArticle(int $id) : void
    {
        $this->isAdmin();
        $article = new BlogModel($this->db);
        $res = $article->delete($id);
        if ($res) {
            header("Location: /monprojet/admin/articles");
        }
    }

    public function deleteGame(int $id) : void
    {
        $this->isAdmin();
        $game = new GameModel($this->db);
        $res = $game->delete($id);
        if ($res) {
            header("Location: /monprojet/admin/games");
        }
    }
    public function deleteMessage(int $id): void
    {
        $this->isAdmin();
        $message = new ContactModel($this->db);
        $res = $message->delete($id);
        // var_dump($res);
        // die();
        if ($res) {

            header('Location: /monprojet/admin/contact');
        }
    }
}
