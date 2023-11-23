<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Eliabrian\LaravelJikan\Contracts\ApiInterface;
use Exception;
use Illuminate\Support\Collection;

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
            method: 'GET',
            uri: 'anime'
        );
        
        return $this->response;
    }
}