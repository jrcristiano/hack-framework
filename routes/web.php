<?php

use App\Http\Controllers\ProductController;
use Core\Router\Router;

$router = new Router;

$router->get('/produtos', [ProductController::class, 'index']);
