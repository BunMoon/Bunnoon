<?php

declare(strict_types=1);

namespace App\Domain\Episode;

interface EpisodeRepository
{
    /**
     * Find many episode records by anime primary key.
     * 
     * @return Episode[]
     */
    public function findByAnimeId(int $animeId): array;
}