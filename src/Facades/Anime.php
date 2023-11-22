<?php

namespace Eliabrian\LaravelJikan\Facades;

use Illuminate\Support\Facades\Facade;

class Anime extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'anime';
    }
}