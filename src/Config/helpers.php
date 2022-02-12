<?php

use Iguid\Config\Config;
use Iguid\View\Viewer;

function config(string $value, $default = '')
{
    return (new Config($value, $default))->get();
}


/**
 * ---------------------------------------------
 * View helper
 * ---------------------------------------------
 * @param string $name
 * @return \Iguid\View\Viewer
 */
function view($name): \Iguid\View\Viewer
{
    return new Viewer($name);
}