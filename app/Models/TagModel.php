<?php

namespace App\Models;

use Database\DBConnection;

class TagModel extends Model
{
    protected $table = 'tags';

    // sélectionner tout dans la table article 
    // joindre dans la table pivot article_tag le champ article_id à l'id de la table articles
    // en fonction des id des tags
    public function getArticles(){
        return $this->query("SELECT a.* FROM articles a
        INNER JOIN article_tag art ON art.article_id = a.id
        WHERE art.tag_id = ?", [$this->id]);
    } 
}
