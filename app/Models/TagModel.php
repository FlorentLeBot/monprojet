<?php

namespace App\Models;

use Database\DBConnection;

class TagModel extends Model
{
    protected $table = 'tags';

    public function getArticles(){
        return $this->query("SELECT a.* FROM articles a
        INNER JOIN article_tag art ON art.article_id = a.id
        WHERE art.tag_id = ?", $this->id);
    } 
}
