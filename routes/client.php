<?php

use App\Controllers\client\HomeController;

$router->get('/', HomeController::class . '@index');
$router->get('/about', function () {
    echo "about page";
});