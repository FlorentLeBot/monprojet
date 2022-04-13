<?php

namespace App\Models;

use App\Models\Model;
use Database\DBConnection;

class ContactModel extends Model
{
    protected $table = 'contact';

    public function postMail(string $firstname, string $lastname, string $email, string $content)
    {
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $email = htmlentities($_POST['email']);
        $content = htmlentities($_POST['content']);

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ( `firstname`, `lastname`, `email`, `content`) VALUE(?, ?, ?, ?)");      
        $stmt = $stmt->execute([$firstname, $lastname, $email, $content]);
        return $stmt;
    }
    
}
