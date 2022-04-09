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
        <button class="btn"><a href="/monprojet/articles/$this->id">Lire plus</a></button>
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
        // $path = htmlspecialchars($_POST['img']);

        // supprimer les tags actuels
        $stmt = $this->db->prepare("DELETE FROM article_tag WHERE article_id = ?");
        $res = $stmt->execute([$id]);

        // réinsertion des données
        foreach ($tags as $tagId) {
            $stmt = $this->db->prepare("INSERT article_tag (article_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($tagId)]);
        }

        parent::update([
            "id" => $id,
            "title" => $title,
            "content" => $content,
            "img" => $path
        ]);

        if ($res) {
            return true;
        }
    }

    // enregistrement d'une image
    private function upload(array $file)
    {
        // récupération des valeurs de $_FILES
        if (isset($file['img'])) {
            $name = $file['img']['name'];
            $tmpName = $file['img']['tmp_name'];
            $error = $file['img']['error'];
            $size = $file['img']['size'];
        }

        // séparation du nom de l'image et de son extension 
        $tabExtension = explode('.', $name);
        // transformation de l'extension en minuscule
        $extension = strtolower(end($tabExtension));
        // extensions accepté
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
        // taille maximum d'une image
        $maxSize = 40000000;
        $path = "";
        // si le nom de l'extension, la taille maximum et le code d'erreur est égal à 0 (aucune erreur de téléchargement)...
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // créer un nom unique ...
            $uniqueName = uniqid('', true);
            // rajouter le point et le nom de l'extension 
            $file = $uniqueName . "." . $extension;
            // télécharger l'image      
            move_uploaded_file($tmpName, './upload/' . $file);
            $path = "/public/upload/" . $file;
        } else {
            echo 'Une erreur est survenue';
        }
        $path = htmlspecialchars($path);
        return $path;
    }

    
    public function create(array $data, array $tags = null, array $categories = null)
    {

        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        parent::create([
            "title" => $title,
            "content" => $content,
            "img" => $path
        ]);

        $id = $this->db->lastInsertId();

        foreach ($tags as $tagId) {
            $stmt = $this->db->prepare("INSERT article_tag (article_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($tagId)]);
        }
        return true;
    }
}
