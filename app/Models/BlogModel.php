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
                            WHERE art.article_id = ?
                            ", [$this->id]);
    }
    
    public function updateKiss(int $id, array $tags){
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        // récupération des valeurs de $_FILES
        if (isset($_FILES['img'])) {
            $name = $_FILES['img']['name'];
            $tmpName = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];
            $size = $_FILES['img']['size'];
        }
        
        // séparation du nom de l'image et de son extension 
        $tabExtension = explode('.', $name);
        // transformation de l'extension en minuscule
        $extension = strtolower(end($tabExtension));
        // extensions accepté
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        // taille maximum d'une image
        $maxSize = 400000;
        // si le nom de l'extension, la taille maximum et le code d'erreur est égal à 0 (aucune erreur de téléchargement)...
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // créer un nom unique ...
            $uniqueName = uniqid('', true);
            // rajouter le point et le nom de l'extension 
            $file = $uniqueName . "." . $extension;
            // télécharger l'image      
            move_uploaded_file($tmpName, './upload/' . $file);    
            $path = "/public/upload/" . $file;
        }else{
            echo 'Une erreur est survenue';
        }
        $path = htmlspecialchars($path);

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

        if($res){
            return true;
        }
        
    }
}
