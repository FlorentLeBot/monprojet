<?php

namespace Router;

class Router
{
    public $url;
    public $routes = [];

    // fonction constructrice de la classe avec comme paramètre l'url
    public function __construct($url)
    {
        // retirer les / en début et fin d'url
        $this->url = trim($url, '/');
    }
    // fonction get permettant de récupérer le chemin et l'action 
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    // fonction permettant de lancer l'action 
    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            // si notre route correspond à l'url 
            if ($route->matches($this->url)) {
                // on exécute
                $route->execute();
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }
}
