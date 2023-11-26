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

    /**
     * @var string $uri
     */
    public $uri = 'anime';

    public function id(int $id): self
    {
        $this->urlParameters['id'] = $id;

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

        $this->urlParameters['type'] = $type;

        return $this;
    }

    public function search(array $queryParameters): self
    {
        $this->queryParameters = $queryParameters;

        return $this;
    }

    public function random(): self
    {
        $this->urlParameters['anime'] = 'anime';
        $this->uri = 'random';

        return $this;
    }

    public function top(array $queryParameters = []): self
    {
        $this->urlParameters['anime'] = 'anime';
        $this->uri = 'top';
        $this->queryParameters = $queryParameters;

        return $this;
    }

    public function get(): array
    {
        return $this->call();
    }

}
