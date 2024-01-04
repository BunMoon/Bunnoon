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

    /**
     * Find one genre by title record.
     * 
     * @return Genre
     * @throws GenreNotFoundException
     */
    public function findOneByTitle(string $title): Genre;
}