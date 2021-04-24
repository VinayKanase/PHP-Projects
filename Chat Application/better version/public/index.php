<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\ViewController;

$router = new Router;
$router->get('/', [ViewController::class, 'index']);
$router->get('/index', [ViewController::class, 'index']);
$router->post('/', [ViewController::class, 'index']);
$router->post('/index', [ViewController::class, 'index']);
$router->get('/login', [ViewController::class, 'login']);
$router->post('/login', [ViewController::class, 'login']);
//No access without login/signup
$router->get('/users', [ViewController::class, 'users']);
$router->get('/chat', [ViewController::class, 'chat']);
$router->get('/logout', [ViewController::class, 'logout']);


//check for if routes are available and show them
$router->resolve();
