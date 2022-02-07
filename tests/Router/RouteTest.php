<?php

namespace Router;

use Iguid\Router\Route;
use Iguid\Router\Router;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testGetRouter()
    {
        $router = new Router;

        $router->get('/test', [TestController::class, 'app']);

        dd($router);
    }
}
