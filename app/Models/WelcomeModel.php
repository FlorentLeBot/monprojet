<?php

namespace App\Models;

use Database\DBConnection;

class WelcomeModel extends Model {

    public function getLasterGames(){
        $req = $this->db->query("SELECT * FROM board_game_card ORDER BY created_at DESC LIMIT 3");
        $res = $req->fetchAll();
        //var_dump($res);die;
        return $res;
    }
    public function getLasterArticles(){
        $req = $this->db->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 3");
        $res = $req->fetchAll();
        //var_dump($res);die;
        return $res;
    }
}