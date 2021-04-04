<?php
require_once __DIR__ . "/../vendor/autoload.php";

use app\Router;
use app\controllers\AppController;
/* Instansiate Router */

$router = new Router();

/* Routing Files */
$router->get('/', [AppController::class, 'index']);
$router->post('/', [AppController::class, 'index']);
$router->get('/home', [AppController::class, 'index']);
$router->post('/home', [AppController::class, 'index']);
$router->get('/categories', [AppController::class, 'categories']);
$router->get('/wishlist', [AppController::class, 'wishlist']);
$router->get('/accountsettings', [AppController::class, 'accountsettings']);
$router->get('/aboutus', [AppController::class, 'aboutus']);
$router->get('/cart', [AppController::class, 'cart']);
$router->get('/signin', [AppController::class, 'signin']);
$router->post('/signin', [AppController::class, 'signin']);
$router->get('/signup', [AppController::class, 'signup']);
$router->post('/signup', [AppController::class, 'signup']);
$router->get('/addproduct', [AppController::class, 'addproduct']);
$router->post('/addproduct', [AppController::class, 'addproduct']);
$router->get('/viewproduct', [AppController::class, 'viewproduct']);
$router->post('/addtocart', [AppController::class, 'addtocart']);
/* Checking and Sending or Resolving Requests */
$router->resolve();
