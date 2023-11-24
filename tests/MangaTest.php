<?php

namespace Eliabrian\LaravelJikan\Tests;

use Eliabrian\LaravelJikan\Facades\Manga;
use Eliabrian\LaravelJikan\Tests\TestCase;

final class MangaTest extends TestCase
{
    public function test_can_search_manga(): void
    {
        $params = [
            'q' => 'Monster',
            'type' => 'manga',
            'sfw' => true,
            'limit' => 1,
        ];

        $manga = Manga::search($params)->get();
        $this->assertArrayHasKey('data', $manga);
    }
}