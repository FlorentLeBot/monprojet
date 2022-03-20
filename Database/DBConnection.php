<?php

namespace Database;

use PDO;

class DBConnection
{
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;

    function __construct(string $dbname, string $host, string $username, string $password)
    {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }
    public function getPDO(): PDO
    {
        // récupération des identifiants de connexion de manière dynamique
        // si $this->pdo est null retourne une nouvelle instance de PDO sinon retourne $this->pdo
        return $this->pdo ?? $this->pdo = new PDO(
            "mysql:dbname={$this->dbname};host={$this->host}",
            $this->username,
            $this->password,
            array(
                // active le mode exception
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
            )
        );
    }
}

// Singleton
// private static $pdo = null;

// protected static function connect()
// {
//     if (isset(self::$pdo)) {
//         return self::$pdo;
//     } else {

//         $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

//         self::$pdo =
//             new PDO(
//                 $path,
//                 $_ENV['DB_USERNAME'],
//                 $_ENV['DB_PASSWORD']
//             );

//         return self::$pdo;
//     }
// }