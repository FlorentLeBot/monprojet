<?php

namespace App\Controllers\Admin;

use App\Models\BlogModel;
use App\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\GameModel;

class AdminController extends Controller
{

    public function index()
    {
        $articles = (new BlogModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.index', compact('articles'));
    }
    public function game()
    {
        $games = (new GameModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    public function contact()
    {
        $contact = (new ContactModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }
    public function edit(int $id)
    {
        $article = (new BlogModel($this->db))->findById($id);
        return $this->viewAdmin('admin.dashboard.edit', compact('article'));
    }
    public function delete(int $id)
    {
        $article = new BlogModel($this->db);
        $res = $article->delete($id);

        if ($res) {
            return header("Location: /admin/articles");
        }
    }
}
