<?php

use Router\Router;
use Exceptions\NotFoundException;

require '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Les constantes : mes chemins vers les vues et les scripts

define('VIEWS', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' .  "/");
define('VIEWSADMIN', dirname(__DIR__) . "/" . 'app' . "/" . 'Views');
define('VIEWSERRORS', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' .  "/" . 'errors' . "/");
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . "/");

// création d'une nouvelle instance de la classe Router 
// paramètre $_GET['url'] configurer dans .htaccess

$router = new Router($_GET['url']);

// connexion compte utilisateur / compte administrateur

$router->get('login', 'App\Controllers\UserController@login');
$router->post('login', 'App\Controllers\UserController@loginPost');

// déconnexion 

$router->get('logout', 'App\Controllers\UserController@logout');

// inscription

$router->get('register', 'App\Controllers\UserController@register');
$router->post('register', 'App\Controllers\UserController@registerPost');

/* -----FRONT----- */

// La page d'accueil

$router->get('/', 'App\Controllers\WelcomeController@welcome');
// $router->get('/game/:id', 'App\Controllers\WelcomeController@show');
// $router->get('/article/:id', 'App\Controllers\WelcomeController@show');


// Tous les articles / Tous les jeux

$router->get('/articles', 'App\Controllers\BlogController@index');
$router->get('/games', 'App\Controllers\GameController@index');

// $router->get('/categories', 'App\Controllers\GameController@categories');

// Un article / Un jeu

$router->get('/articles/:id', 'App\Controllers\BlogController@show');
$router->get('/games/:id', 'App\Controllers\GameController@show');


// Les articles par tag / Les jeux par catégorie

$router->get('/tags/:id', 'App\Controllers\TagController@tag');
$router->get('/categories/:id', 'App\Controllers\CategoryController@category');

// Page contact (affichage des messages) / envoyer un email 

$router->get('contact', 'App\Controllers\ContactController@contact');
$router->post('contact', 'App\Controllers\ContactController@postMail');

// Commentaire / envoyer un commentaire

$router->get('comment', 'App\Controllers\UserController@comment');
$router->post('comment', 'App\Controllers\UserController@postComment');
$router->get('comment', 'App\Controllers\UserController@getComment');

/* -----ADMINISTRATION----- */

// les 3 pages de l'administration

$router->get('/admin/articles', 'App\Controllers\Admin\AdminController@article');
$router->get('/admin/games', 'App\Controllers\Admin\AdminController@game');
$router->get('/admin/contact', 'App\Controllers\Admin\AdminController@contact');

// Supprimer

$router->post('/admin/articles/delete/:id', 'App\Controllers\Admin\AdminController@deleteArticle');
$router->post('/admin/games/delete/:id', 'App\Controllers\Admin\AdminController@deleteGame');
$router->post('/admin/contact/delete/:id', 'App\Controllers\Admin\AdminController@deleteMessage');

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

// Lire les messages

$router->get('/admin/read/:id', 'App\Controllers\Admin\AdminController@readMessage');

// Pagination

$router->get('/articles/:id', 'App\Controllers\Front\BlogController@pagination');

// Récupération des erreurs 

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
} 
catch (Error $e){
    require VIEWSERRORS . 'error.php';
}
catch (Exception $e){
    require VIEWSERRORS . 'exception.php'; 
}