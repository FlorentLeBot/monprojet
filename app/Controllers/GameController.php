<?php

namespace App\Controllers;

use App\Models\GameModel;

class GameController extends Controller
{
    // affichage de toutes les fiches des jeux
    public function index()
    {
        $req = new GameModel;
        $games = $req->all();
        return $this->view('front.game.index', compact('games'));
    }
    // affichage d'une fiche
    public function show(int $id)
    {
        $req = new GameModel;
        $game = $req->findById($id);
        return $this->view('front.game.show', compact('game'));
    }
}
