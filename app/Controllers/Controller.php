<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller{
    // TO DO
    public $db;

    public function __construct(DBConnection $db){
        $this->db = $db;
    }
    
    // fonction permettant d'afficher les vues avec comme arguments le chemin et un paramètre optionnel
    // permettant par exemple la récupération de l'id
    public function view(string $path, array $params = null){

        // système de buffering, enregistrement dans la mémoire tampon
        ob_start();
        // je remplace les . par des /
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        var_dump($path);
        require VIEWS . $path . '.php';
        // je stocke ma vue dans la variable $content
        $content = ob_get_clean();
        require VIEWS . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'layout.php';
    }

    
}