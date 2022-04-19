<?php

namespace App\Controllers;

use App\Models\WelcomeModel;

class WelcomeController extends Controller
{
    // affichage de la page d'accueil
    public function welcome()
    {
        $req = new WelcomeModel;
        $articles = $req->getLasterArticles();
        $games = $req->getLasterGames();
        return $this->view('welcome', compact('games', 'articles'));
    }
}
