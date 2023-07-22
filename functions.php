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
