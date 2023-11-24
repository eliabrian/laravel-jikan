<?php

namespace Eliabrian\LaravelJikan\Tests;

use Eliabrian\LaravelJikan\Facades\Manga;
use Eliabrian\LaravelJikan\Tests\TestCase;

final class MangaTest extends TestCase
{
    public function test_can_get_a_manga(): void
    {
        $manga = Manga::id(1)->get();
        $this->assertArrayHasKey("data", $manga);
    }

    public function test_can_get_manga_characters(): void
    {
        $manga = Manga::id(1)->type('characters')->get();
        $this->assertArrayHasKey("data", $manga);
    }

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