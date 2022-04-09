<?php

namespace App\Controllers;

use Database\DBConnection;

/* Sommaire des méthodes :
- view
- viewAdmin
- isAdmin
*/

abstract class Controller{
    
    public $db;

    public function __construct(DBConnection $db){

        // si on n'a pas de session on la démarre
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        } 
        $this->db = $db;
    }

    // FRONT
    
    // méthode permettant d'afficher les vues avec comme arguments le chemin et un paramètre optionnel
    // permettant par exemple la récupération de l'id
    protected function view(string $path, array $params = null){

        // système de buffering, enregistrement dans la mémoire tampon
        ob_start();
        // je remplace les . par des / dans le chemin
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
       
        require VIEWS . $path . '.php';
        // je stocke ma vue dans la variable $content
        $content = ob_get_clean();
        
        require VIEWS . DIRECTORY_SEPARATOR .  'front' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'layout.php';
    }

    // ADMINISTRATION

    // méthode permettant d'afficher les vues de l'administration
    protected function viewAdmin(string $path, array $params = null){

        ob_start();
    
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
       
        require VIEWSADMIN . DIRECTORY_SEPARATOR . $path . '.php';

        $adminContent = ob_get_clean();
        
        require VIEWSADMIN . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'layout.php';
    }

 
    protected function isAdmin(){
        if(isset($_SESSION['auth']) && $_SESSION['auth'] === 1){
            return true;
        }else{
            return header('Location: /monprojet/login');
        }
    }

    
}