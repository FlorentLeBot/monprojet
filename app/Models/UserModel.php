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
        // $data = [
        //     'username' => $userName,
        //     'password' => $password,
        //     'email'    => $email
        // ];
        //var_dump($data); die;
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (`username`, `password`,`email`) 
        VALUES (?,?,?)");
        $stmt = $stmt->execute([$userName, $password, $email]);
        return $stmt;
    }

    public function registerComment($comment){
        
        $stmt = $this->db->prepare("INSERT INTO `comment` (`content`) 
                                    VALUES (?)");
        $stmt = $stmt->execute([$comment]);
        
        return $stmt;
    }
}