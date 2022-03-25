<?php

use Router\Router;
use Exceptions\NotFoundException;

require '../vendor/autoload.php';

// if ($_SERVER['HTTP_HOST'] ===  "localhost") {
//     $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//     $dotenv->load();
// }

// Les constantes : mes chemins vers les vues et les scripts

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR);
define('VIEWSERRORS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR);
define('VIEWSADMIN', dirname(__DIR__). DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views');
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// création d'une nouvelle instance de la classe Router 
// paramètre $_GET['url'] configurer dans .htaccess

$router = new Router($_GET['url']);

/* -----FRONT----- */

// La page d'accueil

$router->get('/', 'App\Controllers\WelcomeController@welcome');

// La page blog : tous les articles du blog

$router->get('/articles', 'App\Controllers\BlogController@index');

// Un article du blog

$router->get('/articles/:id', 'App\Controllers\BlogController@show');

// Les articles par tag

$router->get('/tags/:id', 'App\Controllers\TagController@tag');

/* -----ADMINISTRATION----- */

// La page d'index : tous les articles du blog

$router->get('/admin/articles', 'App\Controllers\Admin\AdminController@index');

// Supprimer un article

$router->post('/admin/articles/delete/:id', 'App\Controllers\Admin\AdminController@delete');

// Editer un article

$router->get('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController@edit');
$router->post('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController@edit');

// La page game : toutes les fiches des jeux de société

$router->get('/admin/games', 'App\Controllers\Admin\AdminController@game');

// La page contact : tous les messages 

$router->get('/admin/contact', 'App\Controllers\Admin\AdminController@contact');

// Récupération des erreurs 

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
