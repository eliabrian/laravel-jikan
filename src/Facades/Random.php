<?php

namespace Eliabrian\LaravelJikan\Facades;

use Illuminate\Support\Facades\Facade;

class Random extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'random';
    }
}