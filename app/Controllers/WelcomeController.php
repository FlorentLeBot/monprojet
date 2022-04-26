<?php

namespace App\Controllers;

use App\Models\WelcomeModel;

class WelcomeController extends Controller
{
    // affichage de la page d'accueil (les 3 derniers jeux de société et les 3 derniers articles)
    public function welcome() : void
    {
        $req = new WelcomeModel;
        $articles = $req->getLasterArticles();
        $games = $req->getLasterGames();
        $this->view('welcome', compact('games', 'articles'));
    }
    // public function show(int $id) : void
    // {
    //     $req = new WelcomeModel;
    //     $article = $req->findById($id);
    //     $game = $req->findById($id);
    //     $this->view('welcome.show', compact('game', 'article'));
    // }
}
