<?php

namespace Eliabrian\LaravelJikan\Jikan;

class Random extends Jikan
{
    /**
     * @var string $uri
     */
    public $uri = 'random';

    /**
     * Set random anime.
     * 
     * @return self
     */
    public function anime(): self
    {
        $this->urlParameters['anime'] = 'anime';

        return $this;
    }

    /**
     * Set random manga.
     * 
     * @return self
     */
    public function manga(): self
    {
        $this->urlParameters['manga'] = 'manga';

        return $this;
    }

    public function get(): array
    {
        return $this->call();
    }
}