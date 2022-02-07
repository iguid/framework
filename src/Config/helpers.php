<?php

use Iguid\Config\Config;

function config(string $value, $default = '')
{
    return (new Config($value, $default))->get();
}
