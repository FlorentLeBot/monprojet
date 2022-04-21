<?php

namespace App\Models;

use DateTime;
use Database\DBConnection;

class BlogModel extends Model
{
    protected $table = 'articles';

    // affichage du bouton Lire plus dans l'index du blog
    public function getButton(): string
    {
        // syntaxe Heredoc (<<< / un identifiant / une nouvelle ligne / la chaîne de caractère / le même identifiant pour fermer la citation
        return <<<HTML
        <span class="btn"><a href="/monprojet/articles/$this->id">Lire plus</a></span>
        HTML;
    }

    // récupération des tags
    public function getTags()
    {
        return $this->query("SELECT t.* FROM tags t
                            INNER JOIN article_tag art ON art.tag_id = t.id
                            WHERE art.article_id = ?
                            ", [$this->id]);
    }

    // mise à jour d'un article du blog
    public function updateKiss(int $id, array $tags)
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $imgName = htmlspecialchars($_POST['img_name']);

        // supprimer les tags actuels
        $stmt = $this->db->prepare("DELETE FROM article_tag WHERE article_id = ?");
        $res = $stmt->execute([$id]);

        // réinsertion des données
        foreach ($tags as $tagId) {
            $stmt = $this->query("INSERT article_tag (article_id, tag_id) VALUES (?, ?)", [$id, htmlspecialchars($tagId)], true);
           
        }

        parent::update([
            "id" => $id,
            "title" => $title,
            "content" => $content,
            "img" => $path,
            "img_name" => $imgName
            
        ]);

        if ($res) {
            return true;
        }
    }


    public function create(array $data, array $tags = null, array $categories = null)
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $imgName = htmlspecialchars($_POST['img_name']);

        parent::create([
            "title" => $title,
            "content" => $content,
            "img" => $path,
            "img_name" => $imgName
        ]);

        $id = $this->db->lastInsertId();

        foreach ($tags as $tagId) {
            $stmt = $this->db->prepare("INSERT article_tag (article_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($tagId)]);
        }
        return true;
    }
}
