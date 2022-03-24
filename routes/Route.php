<?php

namespace Router;

use Database\DBConnection;

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

    // méthode de correspondance de l'url
    public function matches(string $url)
    {
        // création d'un nouveau chemin
        // regex
        $path = preg_replace('#:([A-Za-z0-9_]+)#', '([^/]+)', $this->path);
        // var_dump($path);die();

        // tout le chemin
        $pathToMatch = "#^$path$#";
        // var_dump($pathToMatch);die();

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            // var_dump($this->matches);die();
            // var_dump($url);die();
            return true;
        } else {
            return false;
        }
    }
    public function execute()
    {

        // récupération du chemin et de la méthode qui a pour délimiteur @
        $params = explode('@', $this->action);

        // la première clé est le controller et la seconde la méthode
        // création d'une nouvelle instance d'un Controller
        $controller = new $params[0](new DBConnection());
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
