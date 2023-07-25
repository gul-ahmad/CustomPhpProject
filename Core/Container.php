<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = [];

    //pushing whatever is coming in bind method
    // $binding will be associate array having key value
    //so pushing resovler(function) =key
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {

            throw new Exception('This binding does not exist');
        }
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}
