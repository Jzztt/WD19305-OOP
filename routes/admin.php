<?php

use App\Controllers\admin\DashboardController;
use App\Controllers\admin\UserController;

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@index');

    // $router->get('/users', UserController::class . '@store');
    $router->get('/users', UserController::class . '@index');
    $router->get('/users/create', UserController::class . '@create');
    $router->post('/users/store', UserController::class . '@store');
    $router->get('/users/show/{id}', UserController::class . '@show');
    $router->get('/users/edit/{id}', UserController::class . '@edit');
    $router->post('/users/update/{id}', UserController::class . '@update');
    $router->get('/users/delete/{id}', UserController::class . '@delete');
});
