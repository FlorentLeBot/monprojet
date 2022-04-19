<?php

namespace App\Models;

use Database\DBConnection;

class WelcomeModel extends Model {

    public function getLasterGames(){
        $res = $this->query("SELECT * FROM board_game_card ORDER BY created_at DESC LIMIT 3");
        return $res;
    }
    public function getLasterArticles(){
        $res = $this->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 3");
        return $res;
    }
}