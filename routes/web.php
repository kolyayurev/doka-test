<?php

use App\Controllers\CatalogController;
use Core\Router;
use App\Controllers\PageController;

$router = Router::getInstance();

$router->get('/', [PageController::class,'index']);

$router->get('/catalog',  [CatalogController::class,'index']);

$router->get('/about',  [PageController::class,'about']);