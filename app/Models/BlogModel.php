<?php

namespace App\Models;

use DateTime;
use Database\DBConnection;

class BlogModel extends Model
{
    
    protected $table = 'articles';

    public function getCreatedAt(): string
    {
        // création d'un nouvelle instance DateTime avec comme paramètre mes created_at 
        // retourne une chaîne de caractère
        // puis je la formate
        return $date = (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }
    public function getExcerpt(): string
    {
        // substr retourne un segnement de la chaîne de caractère
        // paramètre la chaîne de caractère, le début de la chaîne et sa fin
        return substr($this->content, 0, 120) . '...';
    }
    public function getButton(): string
    {
        // syntaxe Heredoc (<<< / un identifiant / une nouvelle ligne / la chaîne de caractère / le même identifiant pour fermer la citation
        return <<<HTML
        <button><a href="/articles/$this->id">Lire plus</a></button>
        HTML;
    }
    public function getTags()
    {
        return $this->query("SELECT t.* FROM tags t
                            INNER JOIN article_tag art ON art.tag_id = t.id
                            INNER JOIN articles a ON art.article_id = a.id
                            WHERE a.id = ?
                            ", $this->id);
    }
      
}
