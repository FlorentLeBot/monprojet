<?php

namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db =  DBConnection::getPDO();
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {

        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0
        ) {
            $stmt = $this->db->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute([$param]);
        }
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $stmt = $this->db->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }
    }
    public  function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
    }

    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", $id);
    }
}
