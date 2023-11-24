<?php

namespace Eliabrian\LaravelJikan\Tests;

use Eliabrian\LaravelJikan\Facades\Random;
use Eliabrian\LaravelJikan\Tests\TestCase;

final class RandomTest extends TestCase
{
    public function test_can_get_random_anime(): void
    {
        $anime = Random::anime()->get();
        $this->assertArrayHasKey("data", $anime);
    }
}