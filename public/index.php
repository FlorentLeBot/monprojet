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
define('VIEWSADMIN', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views');
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// création d'une nouvelle instance de la classe Router 
// paramètre $_GET['url'] configurer dans .htaccess

$router = new Router($_GET['url']);

// connexion compte utilisateur ou compte administrateur

$router->get('login', 'App\Controllers\UserController@login');
$router->post('login', 'App\Controllers\UserController@loginPost');

// déconnexion 

$router->get('logout', 'App\Controllers\UserController@logout');

// inscription

$router->get('register', 'App\Controllers\UserController@register');
$router->post('register', 'App\Controllers\UserController@registerPost');

// commentaire

$router->get('comment', 'App\Controllers\UserController@comment');
$router->post('comment', 'App\Controllers\UserController@comentPost');

/* -----FRONT----- */

// La page d'accueil

$router->get('/', 'App\Controllers\WelcomeController@welcome');

// Tous les articles / Tous les jeux

$router->get('/articles', 'App\Controllers\BlogController@index');
$router->get('/games', 'App\Controllers\GameController@index');

// Un article / Un jeu

$router->get('/articles/:id', 'App\Controllers\BlogController@show');
$router->get('/games/:id', 'App\Controllers\GameController@show');


// Les articles par tag / Les jeux par catégorie

$router->get('/tags/:id', 'App\Controllers\TagController@tag');
$router->get('/categories/:id', 'App\Controllers\CategoryController@category');

/* -----ADMINISTRATION----- */

// les 3 pages de l'administration

$router->get('/admin/articles', 'App\Controllers\Admin\AdminController@article');
$router->get('/admin/games', 'App\Controllers\Admin\AdminController@game');
$router->get('/admin/contact', 'App\Controllers\Admin\AdminController@contact');

// Supprimer

$router->post('/admin/articles/delete/:id', 'App\Controllers\Admin\AdminController@deleteArticle');
$router->post('/admin/games/delete/:id', 'App\Controllers\Admin\AdminController@deleteGame');

// Créer

$router->get('/admin/articles/create', 'App\Controllers\Admin\AdminController@createTag');
$router->post('/admin/articles/create', 'App\Controllers\Admin\AdminController@createArticle');

$router->get('/admin/games/create', 'App\Controllers\Admin\AdminController@createCategory');
$router->post('/admin/games/create', 'App\Controllers\Admin\AdminController@createGame');

// Editer et Mettre à jour

$router->get('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController@editArticle');
$router->post('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController@updateArticle');

$router->get('/admin/games/edit/:id', 'App\Controllers\Admin\AdminController@editGame');
$router->post('/admin/games/edit/:id', 'App\Controllers\Admin\AdminController@updateGame');

// Récupération des erreurs 

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
