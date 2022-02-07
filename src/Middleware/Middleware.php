<?php

namespace Iguid\Middleware;

use Closure;

abstract class Middleware
{
    abstract function handle(Closure $next);

}
