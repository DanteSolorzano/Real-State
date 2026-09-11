<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\PagesController;


$router = new Router();

//private
$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/properties/create', [PropertyController::class, 'create']);
$router->post('/properties/create', [PropertyController::class, 'create']);
$router->get('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/delete', [PropertyController::class, 'delete']);

$router->get('/sellers/create', [SellerController::class, 'create']);
$router->post('/sellers/create', [SellerController::class, 'create']);
$router->get('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/delete', [SellerController::class, 'delete']);

//public
$router->get('/', [PagesController::class, 'index']);
$router->get('/aboutUs', [PagesController::class, 'aboutUs']);
$router->get('/announcements', [PagesController::class, 'announcements']);
$router->get('/announcement', [PagesController::class, 'announcement']);
$router->get('/entrada', [PagesController::class, 'entrada']);
$router->get('/blog', [PagesController::class, 'blog']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contact', [PagesController::class, 'contact']);

//login and auth
$router-> get('/login', [LoginController::class, 'login']);
$router-> post('/login', [LoginController::class, 'login']);
$router-> get('/logout', [LoginController::class, 'logout']);


$router->checkNavigation();
