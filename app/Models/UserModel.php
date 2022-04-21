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

    public function getByUsername(string $username)
    {
        return $this->query("SELECT * FROM {$this->table} 
                              WHERE username = ?", [$username], true);
    }
    public function registerUser(string $userName, string $password, string $email)
    {
        $stmt = $this->query("INSERT INTO {$this->table} (`username`, `password`,`email`) 
        VALUES (?,?,?)",[$userName, $password, $email], true);
        return $stmt;
    }

    public function registerComment(string $comment){
        // htmlSpecial...
        $comment = htmlspecialchars($comment);
        $stmt = $this->query("INSERT INTO `comment` (`content`,`id_user`, `id_article`) 
                                    VALUES (?,?,?)",[$comment, $_SESSION['id'], $_POST['id_article']], true);   
        return $stmt;
    }
    public function getComment(){
        $stmt = $this->query("SELECT `content` FROM `comment`");
    }
    
    
}