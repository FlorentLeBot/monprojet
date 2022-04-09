<?php

namespace App\Models;

/* Sommaire des méthodes :

- getByUsername
- registerUser
- commentUser

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
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (`username`, `password`,`email`) 
        VALUES (?,?,?)");
        $stmt = $stmt->execute([$userName, $password, $email]);
        return $stmt;
    }
    public function commentUser(){
        $stmt = $this->db->prepare('INSERT INTO `comment` (`content`) 
                                    SELECT `id_user` FROM user 
                                    INNER JOIN  ');
    }
}