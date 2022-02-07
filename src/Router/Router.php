<?php

namespace Iguid\Router;

use Mezon\Router\Router as MRouter;

class Router extends MRouter
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($route, $action)
    {
        $this->addRoute($route, $action);
    }

}