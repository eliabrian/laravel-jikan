<?php

namespace Eliabrian\LaravelJikan\Tests;

use Eliabrian\LaravelJikan\Facades\Anime;
use Eliabrian\LaravelJikan\Tests\TestCase;

final class AnimeTest extends TestCase
{
    public function test_can_search_anime(): void
    {
        $params = [
            'q' => 'Demon Slayer',
            'type' => 'tv',
            'sfw' => true,
            'limit' => 1,
        ];

        $anime = Anime::search($params)->get();
        $this->assertArrayHasKey("data", $anime);
    }
}