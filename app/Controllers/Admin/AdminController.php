<?php

namespace App\Controllers\Admin;

use App\Models\BlogModel;
use App\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\GameModel;
use App\Models\TagModel;

class AdminController extends Controller
{

    /* ---LES VUES--- */

    // méthode affichage de la page index dans le dashboard administration du blog
    public function index()
    {
        $this->isAdmin();
        // nouvelle instance de BlogModel affichage de tous les articles
        $articles = (new BlogModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.index', compact('articles'));
    }
    // méthode affichage de la page game administration des fiches pour les jeux de société
    public function game()
    {
        $this->isAdmin();
        $games = (new GameModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    // méthode affichage de la page contact récupération du formulaire de contact
    public function contact()
    {
        $this->isAdmin();
        $contact = (new ContactModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }

    /* ---LES METHODES EDITER, CREER...--- */

    // méthode de création d'un article

    public function create(){
        $this->isAdmin();
        $tags = (new TagModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formBlog', compact('tags'));   
    }

    public function createArticle(){
        $this->isAdmin();
        $article = new BlogModel($this->db);
        // array_pop() dépile et retourne la valeur du dernier élément du tableau array, le raccourcissant d'un élément.
        $tags = array_pop($_POST);
  
        //var_dump($_POST); die();
        $res = $article->create($_POST, $tags);

        // redirection
        if ($res) {
            return header('Location: /admin/articles');
        }
    }
    
    // méthode permettant d'éditer un article du blog par id
    public function edit(int $id)
    {
        $this->isAdmin();
        $article = (new BlogModel($this->db))->findById($id);
        $tags = (new TagModel($this->db))->all();

        $res = $this->viewAdmin('admin.dashboard.formBlog', compact('article', 'tags'));
        return $res;
    }

    // méthode permettant la mise à jour d'un article
    public function update(int $id)
    {
        $this->isAdmin();
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
        $this->isAdmin();
        $article = new BlogModel($this->db);
        $res = $article->delete($id);

        if ($res) {
            return header("Location: /admin/articles");
        }
    }

}
