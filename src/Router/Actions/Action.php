<?php

namespace Iguid\Router\Actions;


class Action
{
    public static function json($field)
    {
        if (is_array($field)) {
            header('Content-Type: application/json');
            print_r(json_encode($field));
        }
    }

    public static function array($field)
    {
        print_r($field);
    }
}
