<?php

namespace Core;

class Validatator
{

    public static function string($value, $min = 0, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
