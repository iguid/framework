<?php

namespace Iguid\Support;

use ReflectionClass;

class Facade
{

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
