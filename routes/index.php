<?php
// Create Router instance
$router = new \Bramus\Router\Router();

require 'client.php';
require 'admin.php';
// Run it!
$router->run();