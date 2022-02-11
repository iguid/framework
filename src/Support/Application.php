<?php

namespace Iguid\Support;

use Iguid\Support\Interface\Application as InterfaceApplication;

class Application implements InterfaceApplication
{
    private $base_path;

    public function __construct($base_path)
    {
        $this->base_path = $base_path;
    }

    public function configPath()
    {
        
    }

    public function basePath()
    {
        return $this->base_path;
    }

    public function request()
    {
        
    }

    public function singleton($class, $args = [])
    {
        Singleton::getInstance($class, $args);
    }
}
