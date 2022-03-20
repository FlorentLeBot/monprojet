<?php

namespace App\Controllers;

abstract class Controller{

    // fonction permettant d'afficher les vues avec comme arguments le chemin et un paramètre optionnel
    // permettant par exemple la récupération de l'id
    public function view(string $path, array $params = null){

        // système de buffering, enregistrement dans la mémoire tampon
        ob_start();
        // je remplace les . par des /
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        // si il y a des paramètres (exemple l'id dans la fonction show()) ...
        if($params){
            // vérifie chaque clé afin de contrôler si elle a un nom de variable valide
            $params = extract($params);
        }
        // je stocke ma vue dans la variable $content
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}