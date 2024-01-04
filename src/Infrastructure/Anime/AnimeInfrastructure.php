<?php

declare(strict_types=1);

namespace App\Infrastructure\Anime;

use App\Domain\Anime\Anime;
use App\Domain\Anime\AnimeRepository;
use App\Infrastructure\Infrastructure;

class AnimeInfrastructure extends Infrastructure implements AnimeRepository
{
    /**
     * {@inheritDoc}
     */
    public function findByGenreId(int $genreId): array
    {
        $animes = $this->db->query(
            "SELECT * FROM animes WHERE genreId=? ORDER BY id DESC",
            [$genreId]
        );
        $result = [];
        foreach ($animes as $anime) {
            array_push($result, new Anime($anime));
        }
        return array_values($result);
    }
}