<?php

namespace App\Models;




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
}