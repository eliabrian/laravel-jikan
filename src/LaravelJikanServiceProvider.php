<?php

namespace Eliabrian\LaravelJikan;

use Eliabrian\LaravelJikan\Jikan\Anime;
use Eliabrian\LaravelJikan\Jikan\Manga;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class LaravelJikanServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->bind('anime', function (Application $app) {
            return new Anime();
        });

        $this->app->bind('manga', function (Application $app) {
            return new Manga;
        });
    }
}
