<?php

namespace Iguid\Router\Actions;

use ReflectionClass;
use ReflectionMethod;

/**
 * What is return  in Controller [array, view, etc]
 * we will make it here
 */
class RunRoute
{

    private $action;
    private $args;

    public function __construct($action, $args)
    {
        $this->action = $action;
        $this->args = $args;
        if (is_array($this->action)) {
            $this->invokeAction();
        }else {
            $this->closure();
        }
    }

    protected function invokeAction()
    {
        $args = [];
        $this->argsExtra($args);
        $reflection = $this->reflectionMethod();
        $reflection->invoke(new $this->action[0], ...$args);
    }

    private function closure()
    {
        $action = $this->action;
        $this->format($action());
    }

    private function argsExtra(&$args)
    {
        foreach ($this->reflectionMethod()->getParameters() as $param)
        {
            if ($param->hasType()) {
                $class = $param->getClass()->name;
                $args[$param->name] = new $class; 
            }else {
                $args[$param->name] = $this->args[$param->name]; 
            }
        }
    }

    private function format($action)
    {
        if (config('app.format', 'json') == 'json') {
            return Action::json($action);
        }

        return Action::array($action);
    }

    protected function is_callable()
    {
        print_r($this()->action);
    }


    public function reflectionMethod()
    {
        return new ReflectionMethod($this->action[0], $this->action[1]);
    }
}
