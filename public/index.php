<?php

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';

//require(base_path('Database.php'));

spl_autoload_register(function ($class) {

    //   as we are getting the Class as Core/Database so to replace
    // with Core\Database
    $class = str_replace('//', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});
require base_path('Core/router.php');
