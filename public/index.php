<?php

use Router\Router;

require '../vendor/autoload.php';

// if ($_SERVER['HTTP_HOST'] ===  "localhost") {
//     $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//     $dotenv->load();
// }

// je définis les constantes

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR . 'Front' . DIRECTORY_SEPARATOR);
define('VIEWSADMIN', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR . 'Admin' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// création d'une nouvelle instance de la classe Router 
// paramètre $_GET['url'] configurer dans .htaccess

$router = new Router($_GET['url']);


// les routes en get

// pour le blog

// BlogController est le chemin et index est la méthode de la classe 

$router->get('/', 'App\Controllers\WelcomeController@welcome');
$router->get('/articles', 'App\Controllers\BlogController@index');
$router->get('/articles/:id', 'App\Controllers\BlogController@show');

$router->get('/', 'App\Controllers\AdminController@index');


// pour les jeux de société


// les routes en post

$router->run();
