<?php

namespace Eliabrian\LaravelJikan\Tests;

use Eliabrian\LaravelJikan\LaravelJikanServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelJikanServiceProvider::class,
        ];
    }
}