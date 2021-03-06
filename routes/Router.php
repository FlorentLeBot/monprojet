<?php

namespace Router;

use Exceptions\NotFoundException;

class Router
{
    public $url;
    public $routes = [];

    // méthode constructrice de la classe avec comme paramètre l'url
    public function __construct($url)
    {
        // retirer les / en début et fin d'url
        $this->url = trim($url, '/');
    }
    // méthode get permettant de récupérer le chemin et l'action 
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }
    // méthode post permettant de récupérer le chemin et l'action 
    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    // méthode permettant de lancer l'action 
    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            // si notre route correspond à l'url 
            if ($route->matches($this->url)) {
                // on exécute
                return $route->execute();
            }
        }
        throw new NotFoundException();
    }
}
