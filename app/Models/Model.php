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

    // méthode permettant de faire des rêquetes de manière dynamique
    public function query(string $sql, array $param = null, bool $single = null)
    {
        // création de la méthode
        // si $param est null alors faire une query sinon faire une requête prepare
        $method = is_null($param) ? 'query' : 'prepare';
        // si dans la requête en première position, il y a le mot DELETE, UPDATE ou INSERT
        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0
        ) {
            // création d'une requête prepare
            $stmt = $this->db->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }
        // si $fetch est null alors faire une fetchAll sinon faire un fetch 
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $stmt = $this->db->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        // si la méthode est query retourne une simple requête
        if ($method === 'query') {
            return $stmt->$fetch();
            // sinon faire une requête préparée
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
    // sélectionne tout dans la table et range le par ordre décroissant en fonction de la date de création 
    public  function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }
    // sélectionne tout dans la table en fonction de l'id
    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }
    // supprime dans la table en fonction de l'id 
    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
    // mettre à jour dans la table les champs en fonction de l'id
    public function update(int $id, array $data, ?array $relations = null){

        $sqlRequestPart = "";
        $i = 1;

        // récupération des champs  
        foreach ($data as $key => $value){
            $comma = $i === count($data) ? ' ' : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
            //var_dump($data); die();
        }
        $data['id'] = $id;
        //var_dump($data['id']); die();
        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} 
                            WHERE id = :id", $data);

    }
    // public function upload()
    // {
    //     return $this->query("INSERT INTO file (img) VALUES (?)");
    // }
   
    

}
