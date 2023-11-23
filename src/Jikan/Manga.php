<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Eliabrian\LaravelJikan\Contracts\ApiInterface;

class Manga extends Jikan implements ApiInterface
{
    public function id(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function type(string $type): self
    {
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
            uri: 'manga'
        );
        
        return $response;
    }
}