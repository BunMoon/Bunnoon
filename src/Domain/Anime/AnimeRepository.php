<?php

declare(strict_types=1);

namespace App\Domain\Anime;

interface AnimeRepository
{
    /**
     * Find many anime records by genre primary key.
     * 
     * @return Anime[]
     */
    public function findByGenreId(int $genreId): array;

    /**
     * Find one anime by title record.
     * 
     * @return Anime
     * @throws AnimeNotFoundException
     */
    public function findOneByTitle(string $title): Anime;
}