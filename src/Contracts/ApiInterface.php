<?php

namespace Eliabrian\LaravelJikan\Contracts;

interface ApiInterface
{
    /**
     * Set ID.
     * 
     * @param int $id
     * 
     * @return self
     */
    public function id(int $id): self;

    /**
     * Set type.
     * 
     * @param string $type
     * 
     * @return self
     */
    public function type(string $type): self;

    /**
     * Get the result.
     * 
     * @return array
     */
    public function get(): array;
}
