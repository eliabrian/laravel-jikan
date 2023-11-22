<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Eliabrian\LaravelJikan\Contracts\ApiInterface;
use Exception;
use Illuminate\Support\Collection;

class Anime extends Jikan implements ApiInterface
{

    public const ANIME_CHARACTERS = "characters";
    public const ANIME_STAFF = "staff";
    public const ANIME_EPISODES = "episodes";
    public const ANIME_NEWS = "news";
    public const ANIME_VIDEOS = "videos";
    
    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $type
     */
    protected string $type;

    /**
     * @var array
     */
    protected array $response;

    public function id(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function type(string $type): self
    {
        if (!in_array($type, [
            self::ANIME_CHARACTERS,
            self::ANIME_STAFF,
            self::ANIME_EPISODES,
            self::ANIME_NEWS,
            self::ANIME_VIDEOS
        ])) {
            throw new Exception('Invalid anime detail type: ' . $type);
        }

        $this->type = $type;

        return $this;
    }

    public function get(): array
    {
        $this->response = $this->callWithId(
            method: 'GET',
            parameters: [],
            type: $this->type ?? '',
            uri: 'anime',
            id: $this->id
        );
        
        return $this->response;
    }
}