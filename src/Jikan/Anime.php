<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Eliabrian\LaravelJikan\Contracts\ApiInterface;
use Exception;

class Anime extends Jikan implements ApiInterface
{
    public const ANIME_CHARACTERS = "characters";
    public const ANIME_EPISODES = "episodes";
    public const ANIME_NEWS = "news";
    public const ANIME_PICTURES = "pictures";
    public const ANIME_RECOMMENDATIONS = "recommendations";
    public const ANIME_RELATIONS = "relations";
    public const ANIME_STAFF = "staff";
    public const ANIME_VIDEOS = "videos";
    public const ANIME_FORUM = "forum";
    public const ANIME_STATISTICS = "statistics";
    public const ANIME_MORE_INFO = "moreinfo";
    public const ANIME_USER_UPDATES = "userupdates";
    public const ANIME_REVIEWS = "reviews";
    public const ANIME_THEMES = "themes";
    public const ANIME_EXTERNAL = "external";
    public const ANIME_STREAMING = "streaming";

    public function id(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function type(string $type): self
    {
        if (!in_array($type, [
            self::ANIME_CHARACTERS,
            self::ANIME_EPISODES,
            self::ANIME_NEWS,
            self::ANIME_PICTURES,
            self::ANIME_RECOMMENDATIONS,
            self::ANIME_RELATIONS,
            self::ANIME_STAFF,
            self::ANIME_VIDEOS,
            self::ANIME_FORUM,
            self::ANIME_STATISTICS,
            self::ANIME_MORE_INFO,
            self::ANIME_USER_UPDATES,
            self::ANIME_REVIEWS,
            self::ANIME_THEMES,
            self::ANIME_EXTERNAL,
            self::ANIME_STREAMING,
        ])) {
            throw new Exception('Invalid anime detail type: ' . $type);
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
            urlParameters: ['anime' => 'anime'],
            queryParameters: $this->params ?? []
        );
        
        return $response;
    }

    public function random(): array
    {
        $response = $this->call(urlParameters: [
            'random' => 'random',
            'anime' => 'anime'
        ]);

        return $response;
    }
}