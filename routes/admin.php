<?php

use App\Controllers\admin\UserController;

$router->mount('/admin', function () use ($router) {

    $router->get('/', function () {
        echo 'Dashboard';
    });

    // $router->get('/users', UserController::class . '@store');
    $router->get('/users', UserController::class . '@index');
});
