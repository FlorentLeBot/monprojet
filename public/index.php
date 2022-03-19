<?php 

use Router\Router;

require '../vendor/autoload.php';

// création d'une nouvelle instance de la classe Router 
// paramètre $_GET['url'] configurer dans .htaccess

$router = new Router($_GET['url']);

// les routes en get

// pour le blog

// BlogController est le chemin et index est la méthode de classe 
$router->get('/', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@showBlog');

// pour les jeux de société

// $router->get('/', 'BoardGameController@index');

// les routes en post

$router->run();