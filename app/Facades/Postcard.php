<?php

namespace App\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class Postcard
{

    protected static function resolveFacade($name = "")
    {
        return app()[$name];
        // (app()->make($name));
        // (app()[$name]);
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('Postcard'))
            ->$method(...$arguments);
    }
}
