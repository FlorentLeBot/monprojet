<?php

namespace App\Models;

/* Sommaire des méthodes :

- getByUsername
- registerUser
- registerComment
*/

class UserModel extends Model
{

    protected $table = 'users';

    public function getByUsername(string $username): mixed
    {
        return $this->query("SELECT * FROM {$this->table} 
                              WHERE username = ?", [$username], true);
    }
    public function registerUser(string $userName, string $password, string $email): mixed
    {
        $stmt = $this->query("INSERT INTO {$this->table} (`username`, `password`,`email`) 
        VALUES (?,?,?)", [$userName, $password, $email], true);
        return $stmt;
    }

    public function registerComment(string $comment) : mixed
    {
        $comment = htmlspecialchars($comment);
        $stmt = $this->query("INSERT INTO `comment` (`content`,`id_user`, `id_article`) 
                                    VALUES (?,?,?)", [$comment, $_SESSION['id'], $_POST['id_article']], true);
        return $stmt;
    }
    public function getComment() : string
    {
        $stmt = $this->query("SELECT `content` FROM `comment`");
        return $stmt;
    }
}
