<?php


function dd($value)
{
    echo "<pre>";

    var_dump($value);

    echo "</pre>";
}


function urlIs($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}


function authorize($condition)
{
    if (!$condition) {

        abort(403);
    }
}


// function to get the base path +the needed path
function base_path($path)
{

    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
     require base_path('views/' . $path);
}
