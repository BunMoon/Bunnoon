<?php

declare(strict_types=1);

namespace App\Domain\Genre;

interface GenreRepository
{
    /**
     * List all genre records.
     * 
     * @return Genre[]
     */
    public function find(): array;
}