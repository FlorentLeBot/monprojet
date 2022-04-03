<?php

namespace Database;

use PDO;
use PDOException;

class DBConnection
{
   
    public static function getPDO(): PDO
    {
        try {
            $db = new PDO(
                "mysql:dbname=monprojet;host=localhost",
                'root',
                '',
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
