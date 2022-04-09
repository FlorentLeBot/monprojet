<?php

namespace App\Models;

use DateTime;
use Database\DBConnection;

/* Sommaire des méthodes:
- getButton
- getCategories
- update
- upload
- create
*/

class GameModel extends Model
{
    protected $table = 'board_game_card';

    // affichage du bouton Lire plus
    public function getButton(): string
    {
        // syntaxe Heredoc (<<< / un identifiant / une nouvelle ligne / la chaîne de caractère / le même identifiant pour fermer la citation
        return <<<HTML
        <button class="btn"><a href="/monprojet/games/$this->id">Voir le jeu</a></button>
        HTML;
    }

    public function getCategories()
    {
        return $this->query("SELECT c.* FROM categories c
                            INNER JOIN board_game_card_category AS bgcc ON bgcc.categorie_id = c.id
                            WHERE bgcc.board_game_card_id = ?
                            ", [$this->id]);
    }

    public function updateKiss(int $id, array $categories)
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        // supprimer les catégories actuels
        $stmt = $this->db->prepare("DELETE FROM board_game_card_category WHERE board_game_card_id = ?");
        $res = $stmt->execute([$id]);

        // réinsertion des données
        foreach ($categories as $categoryId) {
            $stmt = $this->db->prepare("INSERT board_game_card_category (board_game_card_id, categorie_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($categoryId)]);
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

    public function create(array $data, ?array $tags = null, ?array $categories = null)
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

        foreach ($categories as $categoryId) {
            $stmt = $this->db->prepare("INSERT board_game_card_category (board_game_card_id, category_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($categoryId)]);
        }
        return true;
    }
}
