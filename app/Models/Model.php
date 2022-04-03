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
        // si $fetch est null alors faire un fetchAll sinon faire un fetch 
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
    public function update(array $data, $tag = null){

        $sqlRequestPart = "";
        $i = 1;

        //récupération des champs d'un formulaire 
        foreach ($data as $key => $value){
            $comma = $i === count($data) ? '' : ', ';
            $i++;
            if($key === "id" ) { continue; }
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
        }

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} 
                            WHERE id = :id", $data);

    }

    // création d'un article de manière dynamique
    
    public function  create(array $data, array $tags = null){
        
        // les parenthèses de la requete
        $firstParenthesis = "";
        $secondParenthesis = "";
        $i= 1;

        foreach ($data as $key => $value){
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }
        //var_dump($firstParenthesis,$secondParenthesis); die();
        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
    }
   
    

}
