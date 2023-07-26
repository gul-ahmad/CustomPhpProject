<?php

use Core\Router;

session_start();

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';

//require(base_path('Database.php'));

spl_autoload_register(function ($class) {

    //   as we are getting the Class as Core/Database so to replace
    // with Core\Database
    //  dd($class);
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // dd($class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Router();

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');
//routerToController($url, $routes);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($url, $method);


require base_path('Core/router.php');
