<?php

namespace Eliabrian\LaravelJikan;

use Eliabrian\LaravelJikan\Jikan\Anime;
use Illuminate\Support\ServiceProvider;

class LaravelJikanServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->singleton('anime', function ($app) {
            return new Anime();
        });
    }
}
