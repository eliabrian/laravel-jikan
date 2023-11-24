<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Eliabrian\LaravelJikan\Contracts\ApiInterface;
use Exception;

class Manga extends Jikan implements ApiInterface
{
    public const MANGA_CHARACTERS = "characters";
    public const MANGA_EXTERNAL = "external";
    public const MANGA_NEWS = "news";
    public const MANGA_TOPICS = "forum";
    public const MANGA_PICTURES = "pictures";
    public const MANGA_STATISTICS = "statistics";
    public const MANGA_MORE_INFO = "moreInfo";
    public const MANGA_USER_UPDATES = "userupdates";
    public const MANGA_REVIEWS = "reviews";
    public const MANGA_RECOMMENDATIONS = "recommendations";
    public const MANGA_RELATIONS = "relations";

    public function id(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function type(string $type): self
    {
        if (!in_array($type, [
            self::MANGA_CHARACTERS,
            self::MANGA_EXTERNAL,
            self::MANGA_NEWS,
            self::MANGA_TOPICS,
            self::MANGA_PICTURES,
            self::MANGA_STATISTICS,
            self::MANGA_MORE_INFO,
            self::MANGA_USER_UPDATES,
            self::MANGA_REVIEWS,
            self::MANGA_RECOMMENDATIONS,
            self::MANGA_RELATIONS,
        ])) {
            throw new Exception('Invalid manga detail type: ' . $type);
        }
        $this->type = $type;

        return $this;
    }

    public function search(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function get(): array
    {
        $response = $this->call(
            urlParameters: ['manga' => 'manga'],
            queryParameters: $this->params ?? []
        );
        
        return $response;
    }

    public function random(): array
    {
        $response = $this->call(urlParameters: [
            'random' => 'random',
            'anime' => 'manga'
        ]);

        return $response;
    }
}