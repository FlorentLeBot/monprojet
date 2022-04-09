<?php 

namespace App\Controllers;

use App\Models\GameModel;

/* Sommaire des méthodes :
- index
- show
*/

class GameController extends Controller
{
    // méthode permettant l'affichage de tous les fiches des jeux
    public function index()
    {
        $req = new GameModel; 
        $games = $req->all();
        return $this->view('front.game.index', compact('games'));
    }
    // méthode permettant l'affichage d'une fiche
    public function show(int $id){
        
        $req = new GameModel;
        $game = $req->findById($id);
        return $this->view('front.game.show', compact('game'));
    }
   
     
}