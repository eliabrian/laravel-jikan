<?php

namespace Eliabrian\LaravelJikan\Facades;

use Illuminate\Support\Facades\Facade;

class Manga extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'manga';
    }
}