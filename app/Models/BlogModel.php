<?php

namespace App\Models;

use Database\DBConnection;

class BlogModel
{
    public $db;
    public function __construct()
    {
        $this->db =  DBConnection::getPDO();
    }

    public  function articles()
    {
        $req = $this->db->query("SELECT * FROM articles ORDER BY created_at DESC");
        $articles = $req->fetchAll();
        return $articles;
    }

    public function article(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM articles WHERE id = ?");  
        $req->execute([$id]);
        $article = $req->fetch();
        return $article;
    }
    
}
