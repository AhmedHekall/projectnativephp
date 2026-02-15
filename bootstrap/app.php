<?php
use Core\Container;
use Core\Database;
use Core\Dispatcher;

$container = new Container();

// singletons
$container->singleton(Database::class, function () {
    $config = require BASE_PATH . 'config.php';
    return new Database($config['database']);
});

// share container with dispatcher
Dispatcher::setContainer($container);

return $container;
