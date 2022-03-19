<?php

namespace Router;

class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {

        // retirer les / en début et fin d'url
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    // fonction de correspondance de l'url
    public function matches(string $url)
    {
        // création d'un nouveau chemin
        // je veux remplacer les : de :id par un caractère alphanumérique 
        // pour tout ce qui n'est pas un / dans le path
        // regex
        $path = preg_replace('#:([A-Za-z0-9_]+)#', '([^/]+)', $this->path);
        // tout le chemin
        $pathToMatch = "#^$path$#";

        // si 
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }
    public function execute(){
        // récupération du chemin et de la méthode qui a pour délimiteur @
        $params = explode('@', $this->action);
        // la première clé est le controller et la seconde la méthode
        // création d'une nouvelle instance d'un Controller
        $controller = new $params[0]();
        $method = $params[1];
        
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
