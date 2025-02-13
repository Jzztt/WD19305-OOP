<?php

use eftec\bladeone\BladeOne;

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $views = __DIR__ . '/views';
        $cache = __DIR__ . '/storage/compiles';

        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

        echo $blade->run($view, $data);
    }
}