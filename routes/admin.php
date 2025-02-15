<?php

use App\Controllers\admin\DashboardController;
use App\Controllers\admin\UserController;

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@index');

    // $router->get('/users', UserController::class . '@store');
    $router->get('/users', UserController::class . '@index');
});
