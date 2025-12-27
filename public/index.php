<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\CategoryController;
use App\Controllers\ArticleController;
use App\Database;


$router = new Router();

// Routes
$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/category/{id}', [CategoryController::class, 'show']);
$router->add('GET', '/article/{id}', [ArticleController::class, 'show']);

// Dispatch
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
