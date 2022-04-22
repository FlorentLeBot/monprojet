<?php

namespace App\Models;

use App\Models\Model;
use Database\DBConnection;

class ContactModel extends Model
{
    protected $table = 'contact';

    public function postMail(string $firstname, string $lastname, string $email, string $content) : string
    {
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $email = htmlentities($_POST['email']);
        $content = htmlentities($_POST['content']);

        $stmt = $this->query("INSERT INTO {$this->table} ( `firstname`, `lastname`, `email`, `content`) VALUE(?, ?, ?, ?)", [$firstname, $lastname, $email, $content]);
        return $stmt;
    }
    public function getMail() : mixed
    {
        $res = $this->query("SELECT `id`, `firstname`, `lastname`, `email`, `content` FROM {$this->table}");
        return $res;
    }
}
