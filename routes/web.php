<?php

use App\Http\Controllers\UserController;
use Dark\Router\Router;

$router = new Router;

$router->get('/users', [UserController::class, 'index']);
