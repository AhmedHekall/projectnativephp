<?php

const BASE_PATH=__DIR__."/../";
require BASE_PATH . 'Core/functions.php';


spl_autoload_register(function ($class) {
    $class = str_replace('\\',DIRECTORY_SEPARATOR, $class);
    
    require base_path( path: "{$class}.php");
    
    });



session_start();
$container = require BASE_PATH . 'bootstrap/app.php';

    
require base_path( "routes.php");

Core\Dispatcher::dispatch();


