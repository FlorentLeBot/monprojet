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
