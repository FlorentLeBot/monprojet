<?php

namespace App\Models;

use Database\DBConnection;

abstract class Model{

    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db =  DBConnection::getPDO();
    }
    public  function all() : array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public function findById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");  
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}