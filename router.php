
<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

//dd($url);

$routes = require('routes.php');

function routerToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {

        require $routes[$url];
    } else {
        abort();
    }
}
function abort($code = 404)
{
    http_response_code($code);
    require("views/{$code}.php");
    die();
}

routerToController($url, $routes);
