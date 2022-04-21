<?php

namespace Database;

use PDO;
use PDOException;

class DBConnection
{
   
    public static function getPDO(): PDO
    {
        try {
            $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";
            
            $db = new PDO(
                $path,
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'],
                array(
                    // active le mode exception
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    // transforme en objet les tableaux récupérés par PDO
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    // active les caractères UTF8
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
                )
            );
        } catch (PDOException $e) {
            echo "Connexion impossible: " . $e->getMessage();
        }
        return $db;
    }
}
