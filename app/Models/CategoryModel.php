<?php

namespace App\Models;

use Database\DBConnection;

class CategoryModel extends Model
{
   
    protected $table = 'categories';

    public function getGames(){
        return $this->query("SELECT bgc.* FROM board_game_card bgc
        INNER JOIN board_game_card_category bgcc ON bgcc.board_game_card_id = bgc.id
        WHERE bgcc.category_id = ?", [$this->id]);
    } 
    
 
}
